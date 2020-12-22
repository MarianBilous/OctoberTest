<?php 
use Acme\Blog\Models\Article;use Acme\Blog\Models\Category;class Cms5fe1ec576afdb120561677_20831c3cfef91aef31470f34e49d8ff1Class extends Cms\Classes\PageCode
{


public function onStart(){
        $this['category'] = $category = Category::where('slug', $this->param('slug'))->first();
        $this['articles'] = Article::where('category_id', $category->id)->get();
}
}
