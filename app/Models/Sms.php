<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Sms extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'message', 'send_time', 'user_id'
    ];
    protected $table = 'sms';

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($m) {
            $m->send_time = Carbon::now();
            $m->user_id = Auth::guard('api')->user()->id;
        });
    }

    public function scopeBetweenSendTime(Builder $query, $from, $to = null): Builder
    {
        return $query->whereBetween('send_time', [$from, !$to ? Carbon::now() : $to]);
    }
}
