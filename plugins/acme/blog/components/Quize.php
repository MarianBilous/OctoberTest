<?php namespace Acme\Blog\Components;

use Cms\Classes\ComponentBase;
use Symfony\Component\HttpFoundation\Session\Session;

class Quize extends ComponentBase
{
    public $count;

    public $ses;

    public function componentDetails()
    {
        return [
            'name'        => 'Quize Component',
            'description' => 'No description provided yet...'
        ];
    }

    

    public function onRun()
    {
        $this->ses = new Session;
        //dd($this->ses->has('count'));
        if (!$this->ses->has('count')) {
            $this->ses->set('count', 1);
            $this->count = $this->ses->get('count');
        } else {
            $this->count = $this->ses->get('count');
        }
    }
    public function concat()
    {
        return '::test' . $this->count;
    }

    public function onAnswer()
    {
        $this->makePartial('some-partial');
        dd($this->ses->set('count', $this->count++));        
    }
    
}
