<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductService
{
      public function getAll()
      {
            return Product::with('menu')
                  ->orderbyDesc('id')->paginate(15);
      }
      public function getMenu()
      {
            return Menu::where('active', 1)->get();
      }
      public function set_price($request)
      {
            if ($request->input('price') != 0 && $request->input('price_sale') != 0 && $request->input('price_sale') >= $request->input('price')) {
                  Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
                  return false;
            }
            if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
                  Session::flash('error', 'Vui lòng nhập giá gốc');
                  return false;
            }
      }
      public function insert($request)
      {
            $set_price = $this->set_price($request);
            if ($set_price === false) return false;
            try {
                  $request->except('_token');
                  Product::create($request->all());
                  Session::flash('success', 'Thêm sản phẩm thành công');
            } catch (\Exception $err) {
                  Session::flash('error', 'Thêm sản phẩm không thành công');
                  \Log::info($err->getMessage());
                  return false;
            }
            return true;
      }
}