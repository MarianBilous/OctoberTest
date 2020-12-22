<?php namespace Acme\Blog\FormWidgets;


use Backend\Classes\FormWidgetBase;
use \Acme\Blog\Models\Tag;

/**
 * TagSelector Form Widget
 */
class TagSelector extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    //protected $defaultAlias = 'acme_blog_tag_selector';

    /**
     * @inheritDoc
     */
    public function init()
    {
    }


    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('tagselector');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['id'] = $this->model->id;
        $this->vars['tags'] = Tag::all()->lists('name', 'id');
        $this->vars['name'] = $this->formField->getName().'[]';

        if (!empty($this->getLoadValue())) {
            $this->vars['selectedValues'] = $this->getLoadValue();
        } else {
            $this->vars['selectedValues'] = [];
        }
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        //$this->addCss('css/select2.css', 'Acme.Blog');
        $this->addJs('js/select2.js', 'Acme.Blog');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
