<?php namespace Acme\Blog\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * UniqueValue Form Widget
 */
class UniqueValue extends FormWidgetBase
{
    /**
     * Config attributes
     */
    protected $modelClass = null;
    protected $selectFrom = 'name';
    protected $pattern = 'text';

    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'acme_blog_unique_value';

    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->fillFromConfig([
            'modelClass',
            'selectFrom',
            'pattern',
        ]);

        $this->assertModelClass();

        parent::init();
    }

    protected function assertModelClass()
    {
        if( !isset($this->modelClass) || !class_exists($this->modelClass) )
        {
            throw new \InvalidArgumentException(sprintf("Model class {%s} not found.", $this->modelClass));
        }
    }
    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('uniquevalue');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        //dd($this->formField);
        $this->vars['inputType'] = $this->pattern;
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
    }

    /**
     * @return bool[]
     */
    public function onChange()
    {
        //dd($this->formField->getName());
        //$this->formField->getName() повертає ім'я input - Category[slug],
        // яке ми використовуємо для отримання вхідного значення з даних посту
        $formFieldValue = post($this->formField->getName());

        //dd($this->modelClass);

        $modelRecords = $this->model->newQuery()->where($this->selectFrom, $formFieldValue);
        //dd($modelRecords);

        return ['existsSlug' => (boolean) $modelRecords->count()];
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/uniquevalue.css', 'Acme.Blog');
        $this->addJs('js/uniquevalue.js', 'Acme.Blog');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
