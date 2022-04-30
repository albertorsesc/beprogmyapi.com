<?php

namespace App\Models;

use App\Events\Subscribed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Subscription extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['email'];

    protected static function boot ()
    {
        parent::boot();
        static::created(function ($subscription) {
            Subscribed::dispatch($subscription);
        });
    }

    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }
}
