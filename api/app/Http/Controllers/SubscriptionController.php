<?php

namespace App\Http\Controllers;

use App\Http\Services\SubscriptionService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class SubscriptionController extends Controller
{
    /**
     * @param SubscriptionService $service
     * @return Response|Application|ResponseFactory
     */
    public function index(SubscriptionService $service): Response|Application|ResponseFactory
    {
        return response($service->search());
    }
}
