<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookingDetails)
    {
        $this->bookingDetails = $bookingDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.bookingConfirmation')
                    ->with([
                        'name' => $this->bookingDetails['name'],
                        'email' => $this->bookingDetails['email'],
                        'phone' => $this->bookingDetails['phone'],
                        'vehicle' => $this->bookingDetails['vehicle'],
                    ]);
    }
}
