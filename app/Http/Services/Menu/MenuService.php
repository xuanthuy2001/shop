<?php

namespace App\http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{

      public function getParent()
      {
            return Menu::where('parent_id', 0)->get();
      }


      public function create($request)
      {
            // viết hoa chữ cái đầu 
            $Name = Str::title($request->input('name'));

            try {
                  Menu::create([
                        'name' => (string)$Name,
                        'parent_id' => (int) $request->input('parent_id'),
                        'description' => (string) $request->input('description'),
                        'content' => (string) $request->input('content'),
                        'active' => (string) $request->input('active'),
                  ]);
                  Session::flash('success', 'tạo danh mục thành công');
            } catch (\Exception $err) {
                  Session::flash('error', $err->getMessage());
                  return false;
            }
            return true;
      }
      public function getAll()
      {
            return Menu::orderbyDesc('id')->paginate('20');
      }
}