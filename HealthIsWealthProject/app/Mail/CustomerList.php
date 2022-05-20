<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Collection;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerList extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The students collection.
     *
     * @var \Illuminate\Support\Collection
     */
    public $customers;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Collection $customers)
    {
        $this->customers = $customers;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('owailin388@gmail.com', 'All Customer List')
            ->subject('Customer List')
            ->markdown('mail.list')
            ->with('customers', $this->customers);
    }
}
