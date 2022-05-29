<?php

namespace App\Http\Services;

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
            dd($carts[$product_id]);
            // check xem trong mảng $carts tồn tại key là $product_id hay chưa
            // The Arr::exists method checks that the given key exists in the provided array:
            $exists = Arr::exists($carts,  $product_id);
            if ($exists) {
                  $qtyNew =   $carts[$product_id] + $qty;
                  Session::put('carts', [
                        $product_id => $qtyNew
                  ]);
                  return true;
            }
            Session::put('carts', [
                  $product_id => $qty
            ]);
            return true;
      }
}