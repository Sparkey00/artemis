<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\User\UpdateSettingsRequest;
use App\Http\Resources\UserSettingResource;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(int $id)
    {
        $settings = UserSetting::whereUserId($id)->first();

        return response(new UserSettingResource($settings), Status::OK->value);
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
     * @param UserSetting $userSetting
     * @return Response
     */
    public function show(UserSetting $userSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UserSetting $userSetting
     * @return Response
     */
    public function edit(UserSetting $userSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSettingsRequest $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateSettingsRequest $request, int $id): Response
    {
        $response = UserSetting::whereUserId($id)->update($request->validated());

        return response(['updated' => $response], Status::OK->value);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserSetting $userSetting
     * @return void
     */
    public function destroy(UserSetting $userSetting)
    {
        //
    }
}
