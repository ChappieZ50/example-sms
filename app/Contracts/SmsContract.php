<?php

namespace App\Contracts;


interface SmsContract
{
    public function paginateUserSms();

    public function countUserSms();
}
