<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index()
    {
        /** @var User $user */
        $user = auth()->user();
        $settings = $user->settings;
        $age = (new DateTime($user->date_of_birth))->diff(new DateTime('now'))->y;;

        $dateTo = (new DateTime('now'))->modify(('-' . $settings->age_from . ' years'));
        $dateFrom = (new DateTime('now'))->modify(('-' . $settings->age_to . ' years'));
//        DB::enableQueryLog(); // Enable query log
        $users = User::query()
            ->leftJoin('user_settings', 'user_id', '=', 'users.id')
            ->whereDate('date_of_birth', '>=', $dateFrom->format('Y-m-d H:i:s'))
            ->whereDate('date_of_birth', '<=', $dateTo->format('Y-m-d H:i:s'))
            ->whereIn('gender', User::getGendersForSearch($user->gender))
            ->get();
//        dd(DB::getQueryLog());


        return response($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
