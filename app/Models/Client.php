<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;

class Client extends Authenticatable
{
    use Notifiable, CanResetPassword;

    public function sendPasswordResetNotification($token)
    {
        Mail::to($this->email)->send(new ResetPasswordMail($token, $this->email));
    }
    protected $fillable = [
        'name',
        'last_name',
        'document',
        'address',
        'phone',
        'email',
        'password',
        'deleted',
    ];

    public $timestamps = false;

    public function scopeActive($query){
        return $query->where('deleted', 0);
    }
}
