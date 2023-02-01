<?php

namespace App\Http\Controllers;

use App\Mail\ContactsSendmail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    // index
    public function index() {
        return view("contact.index");
    }

    // confirm 
    public function confirm(Request $request) {
        $request->validate([
            'job' => 'required|in:frontend,backend,infrastructure',
            'name' => 'required',
            'email' => 'required|email',
            'file1' => 'file|max:1600|mimes:pdf',
            'file2' => 'file|max:1600|mimes:pdf',
            'file3' => 'file|max:1600|mimes:pdf'
        ]);

        $inputs = $request->all();
        // dd($request->all());

        return view('contact.confirm', [
            'inputs' => $inputs,
        ]);
    }

    // send mail
    public function send(Request $request) {
        $action = $request->input('action');
        $inputs = $request->except('action');

        // dd($action);
        // dd($inputs);

        if($action !== 'submit'){
            return redirect()
            ->route('contact.index')
            ->withInput($inputs);
        } else {
            Mail::to($inputs['email'])->send(new ContactsSendmail($inputs));
            Mail::to('bcp4510@gmail.com')->send(new ContactsSendmail($inputs));

            // 二重送信対策のためトークンを再発行
            $request->session()->regenerateToken();

            // 送信完了ページのviewを表示
            return view('contact.send');
        }
    }
}
