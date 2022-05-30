<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class CartService
{
      public function create($request)
      {
            $qty = $request->input('num-product');
            $product_id = $request->input('product_id');
            if ($qty <= 0 || $product_id <= 0) {
                  Session::flash('error', 'số lượng hoặc sản phẩm không chính xác');
            }
            //tạo giỏ hàng khi chưa thêm gì vào giỏ hàng thì sẽ null
            $carts = Session::get('carts');
            // nếu giỏ hàng trống thì sẽ thêm vào 
            if (is_null($carts)) {
                  // nếu null thì thêm vào mảng carts là sản phẩm và số lượng 
                  Session::put('carts', [
                        $product_id => $qty
                  ]);
                  return true;
            }

            // check xem trong mảng $carts tồn tại key là $product_id hay chưa
            // The Arr::exists method checks that the given key exists in the provided array:
            $exists = Arr::exists($carts,  $product_id);

            if ($exists) {
                  $carts[$product_id] =   $carts[$product_id] + $qty;
                  Session::put('carts', $carts);
                  return true;
            }

            $carts[$product_id] = $qty;
            Session::put('carts',    $carts);
            return true;
      }
      public function getProduct()
      {
            $carts = Session::get('carts');

            if (is_null($carts)) return false;
            $product_id = array_keys($carts);
            return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
                  ->where('active', 1)
                  ->whereIn('id', $product_id)
                  ->get();
      }
      public function update($request)
      {
            Session::put('carts', $request->input('num-product'));

            return true;
      }
}