<?php 
use Acme\Blog\Models\Article;class Cms5fe1f4b2c36b5971996040_9b0849afe05a32dd8f1ee7da1d405e33Class extends Cms\Classes\PageCode
{

public function onStart(){
        $this['articles'] = Article::orderBy('created_at', 'DESC')->paginate(3);
}
}
