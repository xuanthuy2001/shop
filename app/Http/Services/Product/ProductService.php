<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;

class ProductService
{


      public function getAll()
      {
            return Product::orderbyDesc('id')->paginate('20');
      }
      public function getMenu()
      {
            return Menu::where('active', 1)->get();
      }
}