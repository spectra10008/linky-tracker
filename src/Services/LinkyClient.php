<?php

namespace Sadah\Linky\Services;

use Illuminate\Support\Facades\Http;

class LinkyClient
{
    protected $endpoint;
    protected $token;

    public function __construct()
    {
        $this->endpoint = \config('linky.endpoint');
        $this->token = \config('linky.token');
    }

    public function sendVisit($request)
    {
        Http::withHeaders([
            'X-Webhook-Token' => $this->token
        ])->post($this->endpoint . '/visit', [
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referer' => $request->header('referer'),
            'utm_source' => $request->query('utm_source'),
            'utm_medium' => $request->query('utm_medium'),
            'utm_campaign' => $request->query('utm_campaign'),
        ]);
    }

    public function donation(array $data)
    {
        return Http::withHeaders([
            'X-Webhook-Token' => $this->token
        ])->post($this->endpoint . '/payment', $data)->json();
    }
}