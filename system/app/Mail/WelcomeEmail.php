<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Siswa;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $siswa;

    public function __construct(Siswa $siswa)
    {
        $this->siswa = $siswa;
    }

    public function build()
    {
        return $this->view('emails.welcome')
                    ->with([
                        'nama' => $this->siswa->siswa_nama,
                    ]);
    }
}