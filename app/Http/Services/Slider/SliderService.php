<?php

namespace App\Http\Services\Slider;

use App\Models\Menu;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;

class SliderService
{
      public function insert($request)
      {
            try {
                  Slider::create($request->input());
                  Session::flash('success', 'tạo thành công ');
            } catch (\Exception $err) {
                  Session::flash('error', 'thất bại');
            }
      }
      public function getAll()
      {
            return Slider::orderbyDesc('id')->paginate(15);
      }
}