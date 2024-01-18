<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarBrandRequest;
use App\Http\Resources\CarBrandResource;
use App\Models\CarBrand;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarBrandController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CarBrandResource::collection(CarBrand::all());
    }

    public function show(int $id): CarBrandResource
    {
        return new CarBrandResource(CarBrand::find($id));
    }

    public function store(StoreCarBrandRequest $request)
    {
        $carBrand = CarBrand::create($request->all());

        return response()->json($carBrand, 201);
    }

    public function update(StoreCarBrandRequest $request, int $id)
    {
        $carBrand = CarBrand::findOrFail($id);
        $carBrand->update($request->all());

        return $carBrand    ;
    }

    public function destroy(int $id)
    {
        CarBrand::find($id)->delete();

        return response()->json(null, 204);
    }
}