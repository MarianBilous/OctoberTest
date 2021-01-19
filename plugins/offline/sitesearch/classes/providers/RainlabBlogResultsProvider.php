<?php

namespace OFFLINE\SiteSearch\Classes\Providers;

use Carbon\Carbon;
use Cms\Classes\Controller;
use DB;
use Illuminate\Database\Eloquent\Collection;
use OFFLINE\SiteSearch\Classes\Result;
use OFFLINE\SiteSearch\Models\Settings;
use RainLab\Blog\Models\Post;
use Throwable;

/**
 * Searches the contents generated by the
 * Rainlab.Blog plugin
 *
 * @package OFFLINE\SiteSearch\Classes\Providers
 */
class RainlabBlogResultsProvider extends ResultsProvider
{
    /**
     * @var Controller to be used to form urls to search results
     */
    protected $controller;

    /**
     * ResultsProvider constructor.
     *
     * @param                         $query
     * @param \Cms\Classes\Controller $controller
     */
    public function __construct($query, Controller $controller)
    {
        parent::__construct($query);
        $this->controller = $controller;
    }

    /**
     * Runs the search for this provider.
     *
     * @return ResultsProvider
     */
    public function search()
    {
        if ( ! $this->isInstalledAndEnabled()) {
            return $this;
        }

        foreach ($this->posts() as $post) {
            // Make this result more relevant, if the query is found in the title
            $relevance = mb_stripos($post->title, $this->query) === false ? 1 : 2;

            if ($relevance > 1 && $post->published_at) {
                // Make sure that `published_at` is a Carbon object
                $publishedAt = $post->published_at;
                if (is_string($publishedAt)) {
                    try {
                        $publishedAt = Carbon::parse($publishedAt);
                    } catch (Throwable $e) {
                        // If parsing fails use the current date.
                        $publishedAt = Carbon::now();
                    }
                }
                $relevance -= $this->getAgePenalty($publishedAt->diffInDays(Carbon::now()));
            }

            $result        = new Result($this->query, $relevance);
            $result->title = $post->title;
            $result->text  = $post->summary;
            $result->meta  = $post->created_at;
            $result->model = $post;

            // Maintain compatibility with old setting
            if (Settings::get('rainlab_blog_page') !== null) {
                $result->url = $post->setUrl(Settings::get('rainlab_blog_page', ''), $this->controller);
            } else {
                $result->url = $this->getUrl($post);
            }

            $result->thumb = $this->getThumb($post->featured_images);

            $this->addResult($result);
        }

        return $this;
    }

    /**
     * Get all posts with matching title or content.
     *
     * @return Collection
     */
    protected function posts()
    {
        // If Rainlab.Translate is not installed or we are currently,
        // using the default locale we simply query the default table.
        $translator = $this->translator();
        if ( ! $translator || $translator->getDefaultLocale() === $translator->getLocale()) {
            return $this->postsFromDefaultLocale();
        }

        // If Rainlab.Translate is available we also have to
        // query the rainlab_translate_attributes table for translated
        // contents since the title and content attributes on the Post
        // model are not indexed.
        return $this->postsFromCurrentLocale();
    }

    /**
     * Returns all matching posts from the default locale.
     * Translated attributes are ignored.
     *
     * @return Collection
     */
    protected function postsFromDefaultLocale()
    {
        return $this->defaultModelQuery()
                    ->where(function ($query) {
                        $query->where('title', 'like', "%{$this->query}%")
                              ->orWhere('content', 'like', "%{$this->query}%")
                              ->orWhere('excerpt', 'like', "%{$this->query}%");
                    })
                    ->get();
    }

    /**
     * Returns all matching posts with translated contents.
     *
     * @return Collection
     */
    protected function postsFromCurrentLocale()
    {
        // First fetch all model ids with maching contents.
        $results = DB::table('rainlab_translate_attributes')
                     ->where('locale', $this->currentLocale())
                     ->where('model_type', Post::class)
                     ->where('attribute_data', 'LIKE', "%{$this->query}%")
                     ->get(['model_id']);

        $ids = collect($results)->pluck('model_id');

        // Then return all maching posts via Eloquent.
        return $this->defaultModelQuery()->whereIn('id', $ids)->get();
    }

    /**
     * This is the default "base query" for quering
     * matching models.
     */
    protected function defaultModelQuery()
    {
        return Post::isPublished()->with(['featured_images']);
    }

    /**
     * Checks if the RainLab.Blog Plugin is installed and
     * enabled in the config.
     *
     * @return bool
     */
    protected function isInstalledAndEnabled()
    {
        return $this->isPluginAvailable($this->identifier)
            && Settings::get('rainlab_blog_enabled', true);
    }

    /**
     * Generates the url to a blog post.
     *
     * @param $post
     *
     * @return string
     */
    protected function getUrl($post)
    {
        $url = trim(Settings::get('rainlab_blog_posturl', '/blog/post'), '/');

        return implode('/', [$url, $post->slug]);
    }

    /**
     * Display name for this provider.
     *
     * @return mixed
     */
    public function displayName()
    {
        return Settings::get('rainlab_blog_label', 'Blog');
    }

    /**
     * Returns the plugin's identifier string.
     *
     * @return string
     */
    public function identifier()
    {
        return 'RainLab.Blog';
    }

    /**
     * Return the current locale
     *
     * @return string|null
     */
    protected function currentLocale()
    {
        $translator = $this->translator();

        if ( ! $translator) {
            return null;
        }

        return $translator->getLocale();
    }
}