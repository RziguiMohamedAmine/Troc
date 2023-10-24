<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApprovalEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $approvalComment;

    public function __construct($approvalComment)
    {
        $this->approvalComment = $approvalComment;
    }

    public function build()
    {
        return $this->subject('Approval Email')
                    ->view('emails.approval'); // Create an email template in resources/views/emails/approval.blade.php
    }
}
