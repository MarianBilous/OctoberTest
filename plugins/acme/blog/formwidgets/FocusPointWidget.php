<?php namespace Acme\Blog\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Backend\FormWidgets\FileUpload;
/**
 * FocusPointWidget Form Widget
 */
class FocusPointWidget extends FileUpload
{
    public function onLoadAttachmentConfig()
	{

	}

    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'acme_blog_focus_point_widget';

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
        return $this->makePartial('focuspointwidget');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/focuspointwidget.css', 'Acme.Blog');
        $this->addJs('js/focuspointwidget.js', 'Acme.Blog');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }



}
