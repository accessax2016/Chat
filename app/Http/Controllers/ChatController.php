<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Events\Event;

class ChatController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }

    public function chat() {
    	return view('chat');
    }

    public function send(Request $request) {
    	$message = $request->message;
    	$user = Auth::user();

    	event(new Event($message, $user));
    }
}
