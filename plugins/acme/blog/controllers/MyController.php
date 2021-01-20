<?php namespace Acme\Blog\Controllers;

use Backend;
use BackendMenu;
use Backend\Classes\Controller;
use October\Rain\Support\Facades\Flash;

/**
 * My Controller Back-end Controller
 */
class MyController extends Controller
{
    public $implement = [
        'Backend.Behaviors.RelationController',
    ];

    public $relationConfig = 'config_relation.yaml';



    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Acme.Blog', 'blog', 'mycontroller');

        $this->itemFormWidget = $this->createOrderItemFormWidget();
    }

    public function index()
    {
        $config = $this->makeConfig('$/acme/blog/models/customer/columns.yaml');
        $config->model = new \Acme\Blog\Models\Customer;
        $config->recordUrl = 'acme/blog/mycontroller/update/:id';
        $widget = $this->makeWidget('Backend\Widgets\Lists', $config);
        $widget->bindToController();
        $this->vars['widget'] = $widget;

        //return \Backend::redirect('acme/blog/tests/helloworld');
    }

    public function update($id = null)
    {
        $config = $this->makeConfig('$/acme/blog/models/customer/fields.yaml');
        $config->model = \Acme\Blog\Models\Customer::find($id);

        $this->initRelation($config->model);

        $widget = $this->makeWidget('Backend\Widgets\Form', $config);

        $this->vars['widget'] = $widget;
    }

    public function onUpdate($id = null)
    {
        $data = post();
        $mytest = \Acme\Blog\Models\Customer::find($id);
//        $mytest->test_field = post('test_field');
//        $mytest->save();

        //trace_log(post('test_field'));

        \Flash::success('Jobs done!');
    }

    public function helloworld()
    {
        //$this->vars['name'] = "hello";
    }

    protected $itemFormWidget;

    public function onLoadCreateItemForm()
    {
        $this->vars['itemFormWidget'] = $this->itemFormWidget;
        $this->vars['orderId'] = post('manage_id');
        return $this->makePartial('$/acme/blog/controllers/customers/_item_create_form.htm');
    }

    protected function createOrderItemFormWidget()
    {
        $config = $this->makeConfig('$/acme/blog/models/item/fields.yaml');

        $config->alias = 'itemForm';
        $config->arrayName = 'Item';
        $config->model = new \Acme\Blog\Models\Item;
        $widget = $this->makeWidget('Backend\Widgets\Form', $config);
        $widget->bindToController();

        return $widget;
    }

    public function onCreateItem()
    {
        $data = $this->itemFormWidget->getSaveData();
        $model = new \Acme\Blog\Models\Item;
        $model->fill($data);
        $model->save();
        $order = $this->getOrderModel();
        $order->items()->add($model, $this->itemFormWidget->getSessionKey());

        return $this->refreshOrderItemList();
    }

    public function onDeleteItem()
    {
        $recordId = post('record_id');
        $model = \Acme\Blog\Models\Item::find($recordId);
        $order = $this->getOrderModel();
        $order->items()->remove($model, $this->itemFormWidget->getSessionKey());

        return $this->refreshOrderItemList();
    }

    protected function refreshOrderItemList()
    {
        $items = $this->getOrderModel()->items()
            ->withDeferred($this->itemFormWidget->getSessionKey())->get();

        $this->vars['items'] = $items;
        return ['#itemList' => $this->makePartial('$/acme/blog/controllers/customers/_item_list.htm')];
    }

    protected function getOrderModel()
    {
        $manageId = post('manage_id');

        $order = $manageId
            ? \Acme\Blog\Models\Order::find($manageId)
            : new \Acme\Blog\Models\Order;

        return $order;
    }
}
