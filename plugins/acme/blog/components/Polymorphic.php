<?php namespace Acme\Blog\Components;

use Acme\Blog\Models\Photo;
use Acme\Blog\Models\Product;
use Acme\Blog\Models\Staff;
use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Input;

class Polymorphic extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Polymorphic Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function onSave()
    {
        $data = post();
        $path = Input::get('path');

        if ($data['staff'] != '') {
            $photo = new Photo(['path' => $path]);
            $staff = Staff::find($data['staff']);
            $photo = $staff->photo()->add($photo);

        } elseif ($data['product'] != '') {
            $photo = new Photo(['path' => $path]);
            $product = Product::find($data['product']);
            $product->photo()->add($photo);

        }
        //$photo = $staff->photo;

//        $photo = Photo::find(2);
//        $imageable = $photo->imageable;

    }

    public function getStaff()
    {
        $staff = Staff::all();

        return $staff;
    }
    public function getProduct()
    {
        $product = Product::all();

        return $product;
    }
}
