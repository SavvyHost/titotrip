<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Recovery extends Mailable {

    use Queueable, SerializesModels;

    public function __construct( $data ) {

        $this->data = $data;

    }

    public function build() {

        $data = $this->data;

        return $this->view('mail.recovery', with($data));

    }

}
