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
            return Menu::orderbyDesc('id')->paginate('50');
      }
      public function destroy($request)
      {
            $id = (int)$request->input('id');
            $menu  = Menu::where('id',  $id)->first();
            if ($menu) {
                  return Menu::where('id',  $id)->orWhere('parent_id', $id)->delete();
            }
            return  false;
      }
      public function update($request, $menu)
      {
            $Name = Str::title($request->input('name'));
            try {

                  if ($request->input('parent_id') != $menu->id) {
                        $menu->parent_id = (int)$request->input('parent_id');
                  }

                  $menu->name = (string)$Name;

                  $menu->description = (int)$request->input('description');
                  $menu->content = (int)$request->input('content');
                  $menu->active = (int)$request->input('active');
                  $menu->save();

                  Session::flash('success', 'sửa thành công');
            } catch (\Exception $err) {
                  Session::flash('error', $err->getMessage());
                  return false;
            }

            return true;
      }
}