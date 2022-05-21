<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\http\Services\Menu\MenuService;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService  $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        return view('layout.admin.menu.list', [
            'title' => 'trang danh sách danh mục',
            'menus' => $this->menuService->getAll(),
            'menus' => DB::table('menus')->paginate(15)
        ]);
    }


    // public function api()
    // {
    //     return Datatables::of(Menu::query())->make(true);
    // }

    public function create()
    {
        return view('layout.admin.menu.add', [
            'title' => 'trang thêm danh mục',
            'menus' => $this->menuService->getParent()
        ]);
    }


    public function store(MenuRequest $request)
    {
        $result = $this->menuService->create($request);
        return redirect()->route('list');
    }

    public function show(Menu $menu)
    {
        return view('layout.admin.menu.edit', [
            'title' => 'Chỉnh sửa danh mục' . $menu->name,
            'menus' => $this->menuService->getParent(),
            'menu' => $menu
        ]);
    }



    public function update(MenuRequest $request, Menu $menu)
    {
        $this->menuService->update($request, $menu);

        return redirect()->route('list');
    }


    public function destroy(Request $request)
    {

        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => "xóa thành công danh mục"
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }
}