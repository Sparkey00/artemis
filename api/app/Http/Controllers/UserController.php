<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\UserServiceInterface;
use App\Http\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UserRepositoryInterface $repository
     * @return Response
     */
    public function index(UserRepositoryInterface $repository): Response
    {
        return response($repository->searchMatches());
    }

    /**
     * @param UserService $userService
     * @param int $likedUserId
     * @return Response
     * @throws \Throwable
     */
    public function like(UserServiceInterface $userService, int $likedUserId): Response
    {
        return response(['liked_back' => $userService->processLike($likedUserId)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }
}
