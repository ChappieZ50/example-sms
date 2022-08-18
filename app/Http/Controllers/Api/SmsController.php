<?php

namespace App\Http\Controllers\Api;

use App\Contracts\SmsContract;
use App\Events\SendSms;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SmsRequest;
use App\Http\Resources\SmsResource;
use App\Models\Setting;
use Illuminate\Http\Response;

class SmsController extends Controller
{
    protected $entity;

    public function __construct(SmsContract $entity)
    {
        $this->entity = $entity;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return SmsResource::collection($this->entity->paginateUserSms());
    }

    public function store(SmsRequest $request): \Illuminate\Http\JsonResponse
    {
        $setting = Setting::first();
        if ($setting->continue_from_job) {
            \App\Jobs\SendSms::dispatch($request->validated());
        } else {
            // If "to_job_count" bigger than counted sms data then update "continue_from_job" true
            // If "continue_from_job" is true, this block won't run anymore
            config('soft.to_job_count') <= $this->entity->countUserSms() ?: $setting->update(['continue_from_job' => true]);
            event(new SendSms($request->validated()));
        }

        return response()->json([
            'message' => 'Your sms successfully send'
        ]);
    }

    public function show($id): \Illuminate\Http\JsonResponse|SmsResource
    {
        $sms = $this->entity->find($id);
        if (empty($sms)) {
            return response()->json([
                'message' => 'Sms not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return new SmsResource($sms);
    }
}
