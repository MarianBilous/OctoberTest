<?php namespace Acme\Blog\Models;

use \Backend\Models\ImportModel;

/**
 * ArticleImport Model
 */
class ArticleImport extends ImportModel
{
    /**
     * @var array The rules to be applied to the data.
     */
    public $rules = [];

    public function importData($results, $sessionKey = null)
    {
        foreach ($results as $row => $data) {

            try {
                $article = new Article;
                $article->fill($data);
                $article->save();

                $this->logCreated();
            }
            catch (\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }
    }
}
