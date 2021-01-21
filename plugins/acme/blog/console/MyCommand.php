<?php namespace Acme\Blog\Console;

use Acme\Blog\Models\Article;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MyCommand extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'acme.my';

    /**
     * @var string The console command description.
     */
    protected $description = 'No description provided yet...';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $activArticle = Article::where('visibility', 1)->count();
        $inactiveArticle = Article::where('visibility', 0)->count();
        $this->output->writeln('Active articles: ' . $activArticle);
        $this->output->writeln('Inactive articles: ' . $inactiveArticle);
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [

        ];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
