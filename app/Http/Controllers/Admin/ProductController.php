<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }



    public function index()
    {
        return view('layout.admin.product.list', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $this->productService->getAll()
        ]);
    }


    public function create()
    {
        return view('layout.admin.product.add', [
            'title' => 'Thêm Sản Phẩm Mới',
            'menus' => $this->productService->getMenu()
        ]);
    }


    public function store(StoreProductRequest $request)
    {
        $this->productService->insert($request);

        return redirect()->route('products.list');
    }


    public function show(Product $product)
    {
        return view('layout.admin.product.edit', [
            'title' => 'Chỉnh Sửa Sản Phẩm',
            'product' => $product,
            'menus' => $this->productService->getMenu()
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request, $product);
        if ($result) {
            return redirect()->route('products.list');
        }
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'xóa thành công sản phẩm'
            ]);
        }
        return response('success')->json([
            'error' => true
        ]);
    }
}