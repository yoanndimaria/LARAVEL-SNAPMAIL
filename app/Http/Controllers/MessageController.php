<?php

namespace Snapmail\Http\Controllers;

use Illuminate\Http\Request;
use Snapmail\Message;
use Mail;
use Snapmail\Mail\OrderShipped;



class MessageController extends Controller
{
    public function __construct() {
        $this->message = [
            'status' => [
                'code' => 'OK',
                'http' => 200
            ],
            'content' => 'Success!'
        ];
    }
    public function create(Message $message, Request $request) {
        $data = [
            'key' => str_random(5),
            'email' => $request->email,
            'content' => $request->message
        ];

        if(empty($data['email']) || empty($data['content'])) {
            $this->message['status']['code'] = 'KO-EMPTY-FIELDS';
            $this->message['content'] = 'Veuillez remplir les champs vides !';

            return $this->message;
        }

        if(!isset($data['email'], $data['content'])) {
            $this->message['status']['code'] = 'KO-EMPTY-FIELDS';
            $this->message['content'] = 'Veuillez remplir les champs vides !';

            return $this->message;
        }

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->message['status']['code'] = 'KO-EMAIL';
            $this->message['content'] = 'L\'adresse email n\'est pas valide !';

            return $this->message;
        }

        // Mail::send("emails.template", $data, function ($m) use ($data) {
        //     $m->to($data['email'])->subject('Message rapide');
        // });

        Mail::to($data['email'])->send(new OrderShipped($data));

        $message->key = $data['key'];
        $message->email = $data['email'];
        $message->message = $data['content'];

        $message->save();

        $this->message['content'] = 'Votre message a bien été créé !';

        return $this->message;
    }

    public function get(Message $message, Request $request)
    {
        $final = $message->where('key', $request->key)->firstOrFail();
        
        $data = [
            'email' => $final->email,
            'content' => $final->message,
        ];

        $final->delete();

        return view('emails.read', $data);
    }
}
