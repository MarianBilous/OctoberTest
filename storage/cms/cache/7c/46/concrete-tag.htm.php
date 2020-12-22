<?php 
use Acme\Blog\Models\Article;use Acme\Blog\Models\Tag;class Cms5fe1ec744b442359193146_164b0107f22835274d4711a75b7a4540Class extends Cms\Classes\PageCode
{


public function onStart(){
        $this['tag'] = $category = Tag::where('slug', $this->param('slug'))->first();
}
}
