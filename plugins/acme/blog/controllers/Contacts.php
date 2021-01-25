<?php namespace Acme\Blog\Controllers;

use Acme\Blog\Models\Contact;
use BackendMenu;
use Backend\Classes\Controller;
use Illuminate\Support\Facades\Mail;
use October\Rain\Support\Facades\Flash;

/**
 * Contacts Back-end Controller
 */
class Contacts extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Acme.Blog', 'blog', 'contacts');
    }

    public function onLoadPopup()
    {
		$emails = [
		    'test@email.1',
		    'test@email.2',
		    'test@email.3'
		];
		Flash::success(post('userId'));
		return $this->makePartial('emails_popup', ['emails' => $emails, 'userId' => post('userId')]);
    }

    public function onSendEmail()
    {
		$fromMaile = post('email');
		$user = Contact::find(post('userId'));

		Mail::send('acme.blog::message',
		    ['fromMaile' => $fromMaile,
		        'userEmail' => $user->email,
		        'name' => $user->name ], function($message) use ($fromMaile, $user){
		        $message->from($fromMaile);
		        $message->to($user->email);
		        $message->subject('Test message');
		    });

		Flash::success("Email has been sent");

    }
}
