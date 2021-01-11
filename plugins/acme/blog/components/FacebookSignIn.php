<?php namespace Acme\Blog\Components;

use Cms\Classes\ComponentBase;
use Facebook\Facebook;

class FacebookSignIn extends ComponentBase
{
    public $ID = 391670622129379;
    public $SECRET = 'f8376b983094850c5e5cee2e596eaaa5';
    public $URL = 'http://localhost/';

    public function componentDetails()
    {
        return [
            'name'        => 'FacebookSignIn Component',
            'description' => 'No description provided yet...'
        ];
    }
    
    public function onSign()
    {
        $fb = new Facebook([
            'app_id' => $this->ID ,
            'app_secret' => $this->SECRET ,
            'default_graph_version' => 'v2.10' ,
        ]);

        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email', 'user_likes']; // optional
        $loginUrl = $helper->getLoginUrl($this->URL, $permissions);

        return $loginUrl;
        //dd($loginUrl);
    }
}
