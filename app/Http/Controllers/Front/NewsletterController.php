<?php

namespace App\Http\Controllers\Front;

use App\Service\MailchimpService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
	protected $mailchimp_service;
    public function __construct(MailchimpService $mail_chimp)
	{
		$this->mailchimp_service = $mail_chimp;
	}

	public function subscribe(Request $request)
	{
		$email_address = $request->get('email');
		$validate      = \Validator::make($request->all(),['email' => 'Required|Email']);
		if (!$validate->fails()) {
			try {
				$this->mailchimp_service->subscribe(['email_address' => $email_address]);
				return \Response::json(["success" => true,
					"message" => ($email_address . ' added successfully.')]);
			} catch (\Exception $e) {
				return \Response::json(["success" => false,
					"message" => ($e->getMessage())]);
			}
		} else {
			$messages = $validate->errors();
			return \Response::json(["success" => false,
				"message" => ($messages->first())]);
		}
	}
}
