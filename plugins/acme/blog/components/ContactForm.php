<?php namespace Acme\Blog\Components;

use Cms\Classes\ComponentBase;

use Validator;
use ValidationException;
use Input;
use Mail;
use Flash;

class ContactForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ContactForm Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onSend()
    {
        $data = post();

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
        ];

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            throw new ValidationException($validation);
        } else {
            Mail::send('acme.blog::message',
                array('name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'user_message' => Input::get('message')
                ), function($message) {
                    $message->to('bilous.marian@gmail.com', 'Admin');
                    $message->subject('Test message');
                });
        }

        Flash::success('Jobs done!');
        $this->saveToDB($data);
    }

    public function saveToDB($data)
    {
        $contact = new \Acme\Blog\Models\Contact;
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->message = $data['message'];
        $contact->save();
    }
}
