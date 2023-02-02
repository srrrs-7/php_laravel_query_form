<?php

namespace App\Mail;

use PDF;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactsSendmail extends Mailable
{
    use Queueable, SerializesModels;

    // property
    private $job;
    private $name;
    private $email;
    private $portfolio;
    private $query;
    private $file1;
    private $file2;
    private $file3;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->job = $inputs['job'];
        $this->name = $inputs['name'];
        $this->email = $inputs['email'];
        $this->portfolio = $inputs['portfolio'];
        $this->query = $inputs['query'];
        $this->file1 = $inputs['file1'];
        $this->file2 = $inputs['file2'];
        $this->file3 = $inputs['file3'];
    }

    /**
     * Build the message.
    *
    * @return $this
    */
    public function build()
    {
        // $pdf = PDF::loadView('myPDF', $this->file1);

        // mail configuration
        return $this
            ->from('example@gmail.com')
            ->subject('Auto response mail')
            ->view('contact.mail')
            ->with([
                'job' => $this->job,
                'name' => $this->name,
                'email' => $this->email,
                'portfolio' => $this->portfolio,
                'query' => $this->query,
                'file1' => $this->file1,
                'file2' => $this->file2,
                'file3' => $this->file3
            ]);
    }
}
