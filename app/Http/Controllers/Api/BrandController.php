<?php

namespace App\Http\Controllers\Api;

use App\Constants\StatusResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\JsonResponse;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data' => BrandResource::collection(Brand::all())
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResource
    {
        return new BrandResource(Brand::findOrFail($id));
    }

}
