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
                        'thumb' => (string) $request->input('thumb'),
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
                  $menu->description = (string)$request->input('description');
                  $menu->content = (string)$request->input('content');
                  $menu->active = (string)$request->input('active');
                  $menu->thumb = (string)$request->input('thumb');
                  $menu->save();

                  Session::flash('success', 'sửa thành công');
            } catch (\Exception $err) {
                  Session::flash('error', $err->getMessage());
                  return false;
            }

            return true;
      }
      public function show()
      {
            return Menu::select('name', 'id', 'thumb')
                  ->where('parent_id', 0)
                  ->orderbyDesc('id')->get();
      }


      public function getId($id)
      {
            return Menu::where('id', $id)->where('active', 1)->firstOrFail();
      }
      public function getProducts($menu, $request)
      {


            $query = $menu->Products()
                  ->select('id', 'name', 'price', 'price_sale', 'thumb')
                  ->where('active', 1);
            if ($request->input('price')) {
                  $query->orderBy('price', $request->input('price'));
            }
            return $query->orderbyDesc('id')
                  ->paginate(12)->withQueryString();
      }
}