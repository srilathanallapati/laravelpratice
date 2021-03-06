<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMe extends Mailable
{
    use Queueable, SerializesModels;

    public $topic;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($topic)
    {
        $this->topic = $topic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //using markdown
        return $this->markdown('emails.contact-me-md')
        ->subject('More information about '.$this->topic);

        //html content using view
        //return $this->view('emails.contact-me')
        //            ->subject('More information about '.$this->topic);
        //emails folder in views
    }
}
