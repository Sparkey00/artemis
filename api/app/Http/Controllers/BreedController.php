<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\Breed\StoreBreedRequest;
use App\Models\Breed;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return response(
            Breed::orderBy('id', 'asc')->paginate($request->get('perPage', 20)),
            Status::OK->value
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param StoreBreedRequest $request
     * @return Response
     */
    public function store(StoreBreedRequest $request): Response
    {
        $fields = $request->validated();

        $model = Breed::create([
            'name' => $fields['name']
        ]);
        return response(['model' => $model], Status::OK->value);
    }

    /**
     * Display the specified resource.
     *
     * @param Breed $breed
     * @return Response
     */
    public function show(Breed $breed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Breed $breed
     * @return Response
     */
    public function edit(Breed $breed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreBreedRequest $request
     * @param int $id
     * @return Response
     */
    public function update(StoreBreedRequest $request, int $id)
    {
        $fields = $request->validated();
        if(Breed::whereId($id)->update($fields)) {
            return response(['modelId' => $id], Status::OK->value);
        } else {
            return response([], Status::BadRequest->value);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Breed $breed
     * @return Response
     */
    public function destroy(Breed $breed)
    {
        //
    }
}
