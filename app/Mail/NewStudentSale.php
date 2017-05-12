<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Models\Course;

class NewStudentSale extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $course, $password;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Course $course, $password)
    {
      $this->user = $user;
      $this->course = $course;
      $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Seus dados de acesso')->view('school.mails.new-student-sale');
    }
}
