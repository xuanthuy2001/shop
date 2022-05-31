<?php

namespace App\View\Composers;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartComposer
{

      protected $users;


      public function __construct()
      {
      }


      public function compose(View $view)
      {
            $carts = Session::get('carts');;
            if (is_null($carts)) return false;
            $product_id = array_keys($carts);
            $product = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
                  ->where('active', 1)
                  ->whereIn('id', $product_id)
                  ->get();
            $view->with('products', $product);
      }
}