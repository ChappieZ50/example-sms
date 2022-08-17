<?php

namespace App\Listeners;

use App\Contracts\SmsContract;
use App\Events\SendSms;

class SendSmsListener
{

    protected $entity;

    public function __construct(SmsContract $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @param SendSms $event
     * @param SmsContract $entity
     * @return bool
     */
    public function handle(SendSms $event): bool
    {
        return $this->entity->fill($event->data)->save();
    }
}
