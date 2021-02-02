<?php namespace Acme\Blog\Classes\Jobs;

use October\Rain\Support\Facades\Flash;
use Illuminate\Support\Facades\Mail;
use Acme\Blog\Models\Contact;

class MyContact
{
	public function fire($job, $data)
	{
		//$decoded = json_decode($data);
		//trace_log(var_dump($data));
		//var_dump($data['user']['name']);
		//$user = $data['user'];
		//$fromMaile = $data['fromMaile'];

		//Mail::send('acme.blog::message',
		//    ['fromMaile' => $fromMaile,
		//        'userEmail' => $user->email,
		//        'name' => $user->name ], function($message) use ($fromMaile, $user){
		//            $message->from($fromMaile);
		//            $message->to($user->email);
		//            $message->subject('Test message');
		//});

		//$text = serialize($data);
		$job->release(5);
		$job->delete();
		//Flash::success("Success");
	}
}
