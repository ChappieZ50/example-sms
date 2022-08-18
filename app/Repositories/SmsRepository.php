<?php

namespace App\Repositories;

use App\Contracts\SmsContract;
use App\Models\Sms;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SmsRepository extends BaseRepository implements SmsContract
{
    public function __construct(Sms $entity)
    {
        parent::__construct($entity);
    }

    public function paginateUserSms()
    {
        return QueryBuilder::for($this->entity)
            ->where('user_id', '=', Auth::guard('api')->id())
            ->allowedFields('send_time')
            ->allowedFilters([
                AllowedFilter::scope('between_send_time')
            ])
            ->paginate();
    }

    public function countUserSms()
    {
        return $this->entity->select('user_id')->count('user_id');
    }
}
