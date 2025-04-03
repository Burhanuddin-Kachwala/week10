<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderPlaced extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $order;
    public $recipientType;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order,$recipientType='user')
    {
        $this->order = $order;
        $this->recipientType = $recipientType;
    }

    /**
     * Build the message.
     */
    public function build(): self
    {
        $subject = ($this->recipientType === 'admin')
            ? 'New Order Received - Admin Notification'
            : 'Your Order Confirmation';

        return $this->subject($subject)
            ->view('emails.orders.placed')
            ->with([
                'order' => $this->order,
                'recipientType' => $this->recipientType
            ]);
    }
}
