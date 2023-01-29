<?php

namespace App\Http\Controllers;

use App\Mail\ContactsSendmail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    // index
    public function index()
    {
        return view("contact.index");
    }

    // confirm 
    public function confirm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'title' => 'required',
            'body' => 'required',
        ]);

        $inputs = $request->all();

        return view('contact.confirm', [
            'inputs' => $inputs,
        ]);
    }

    // send mail
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'title' => 'required',
            'body' => 'required'
        ]);

        $action = $request->input('action');
        $inputs = $request->except('action');

        if($action !== 'submit'){
            return redirect()
            ->route('contact.index')
            ->withInput($inputs);
        } else {
            Mail::to($inputs['email'])->send(new ContactsSendmail($inputs));
            Mail::to('自分のメールアドレス')->send(new ContactsSendmail($inputs));

            // 二重送信対策のためトークンを再発行
            $request->session()->regenerateToken();

            // 送信完了ページのviewを表示
            return view('contact.send');
        }
    }
}
