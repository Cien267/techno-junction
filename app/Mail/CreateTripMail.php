<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateTripMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($trip)
    {
        $this->trip = $trip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $title = $this->trip->driver_sell_id ? 'Lái xe bán chuyến' : 'Khách tạo chuyến';
        $subject = '[#'.$this->trip->id.'-'.$this->trip->guest->phone .'] '.$title;
        return $this->subject($subject)->view('emails.create-trip')->with(['trip' => $this->trip]);
    }
}
