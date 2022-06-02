<?php

namespace App\Http\Services;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
            $carts = Session::get('carts');;
            if (is_null($carts)) return [];
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
      public function remove($id)
      {
            $carts = Session::get('carts');

            unset($carts[$id]);
            Session::put('carts', $carts);
            return true;
      }
      public function addCart($request)
      {
            try {
                  // Bắt đầu transaction với DB::beginTransaction();
                  DB::beginTransaction();
                  $carts  = Session::get('carts');

                  if (is_null($carts)) {
                        return false;
                  }
                  $customer = Customer::create([
                        'name' => $request->input('name'),
                        'phone' => $request->input('phone'),
                        'address' => $request->input('address'),
                        'email' => $request->input('email'),
                        'content' => $request->input('content'),
                  ]);

                  $this->infoProductCart($carts, $customer->id);
                  // Nếu try thực hiện 2 lệnh thành công thì DB::commit(); => Xác nhận transaction hoàn thành và lưu lại các thay đổi trong database từ lệnh SQL update.
                  DB::commit();
                  Session::flash('success', 'đặt hàng thành công');
                  Session::forget('carts');
            } catch (\Exception $err) {
                  // Nếu có lỗi và nhảy vào catch thì DB::rollBack(); => Quay lại từ lúc transaction chưa được thực hiện (không lưu các thay đổi trong database từ lệnh SQL update ) đồng thời bắn ra 1 exception.
                  DB::rollBack();
                  Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
                  return false;
            }
      }
      protected function infoProductCart($carts, $customer_id)
      {
            $productId = array_keys($carts);
            $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
                  ->where('active', 1)
                  ->whereIn('id', $productId)
                  ->get();

            $data = [];
            foreach ($products as $product) {
                  $data[] = [
                        'customer_id' => $customer_id,
                        'product_id' => $product->id,
                        'pty'   => $carts[$product->id],
                        'price' => $product->price_sale != 0 ? $product->price_sale : $product->price
                  ];
            }

            return Cart::insert($data);
      }
}