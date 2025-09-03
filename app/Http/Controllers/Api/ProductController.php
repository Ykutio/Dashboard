<?php

namespace App\Http\Controllers\Api;

use App\Constants\SortDirection;
use App\Constants\StatusResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\ProductListRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product\Product;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductListRequest $request): JsonResponse
    {
        $perPage = $request->input('perPage', Product::PER_PAGE);
        $offset = $request->input('offset', 0);
        $sortField = $request->input('sortField', 'id');
        $sortDirection = $request->input('sortDirection', SortDirection::ASC);

        $productCount = Product::productCount(true);

        $data = Product::getProductsList($request->getApiDTO());

        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data' => ProductResource::collection($data),
            'perPage' => $perPage,
            'offset' => $offset,
            'productCount' => $productCount,
            'sortField' => $sortField,
            'sortDirection' => $sortDirection
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $data = new ProductResource(Product::findOrFail($id));
        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data' => $data
        ]);
    }
}
