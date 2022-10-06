<?php

namespace Tests\Feature;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function mail_is_sent_with_from_address()
    {
        Mail::fake();

        $this->get('/')->assertOk();

        Mail::assertSent(function (WelcomeMail $mail) {
            return $mail->hasTo('kristoffer@example.com')
                && $mail->hasFrom('info@example.com');
        });
    }
}
