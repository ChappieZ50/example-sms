<?php

namespace App\Repositories;

use App\Contracts\SmsContract;
use App\Models\Sms;
use Illuminate\Support\Facades\Auth;

class SmsRepository extends BaseRepository implements SmsContract
{
    public function __construct(Sms $entity)
    {
        parent::__construct($entity);
    }

    public function paginateUserSms()
    {
        return $this->entity->where('user_id', '=', Auth::guard('api')->user()->id)->paginate();
    }
}
