<?php

namespace App\Http\Services\Slider;

use App\Models\Menu;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
      public function destroy($request)
      {
            $slider = Slider::where('id',  $request->input('id'))->first();
            if ($slider) {
                  $path = str_replace('storage', 'public', $slider->thumb);

                  Storage::delete($path);

                  $slider->delete();

                  return true;
            }

            return false;
      }

      public function show()
      {
            return Slider::select('name', 'url', 'thumb')
                  ->get();
      }
}