<?php

namespace App\Http\Controllers;

use App\http\Services\Menu\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function index(Request $request, $id, $slug)
    {
        $menu = $this->menuService->getId($id);
        $products  = $this->menuService->getProducts($menu, $request);
        return view('customer.menu', [
            'title' => $menu->name,
            'products' => $products,
            'menu' => $menu
        ]);
    }
}