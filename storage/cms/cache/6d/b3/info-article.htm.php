<?php 
use Acme\Blog\Models\Article;class Cms5fe1e7f0896da259829430_4f4b0876c7cfd4d858237ccf02828e47Class extends Cms\Classes\PageCode
{

public function onStart(){
        $this['article'] = Article::where('slug', $this->param('slug'))->first();
    }
}
