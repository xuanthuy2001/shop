<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\http\Services\Menu\MenuService;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService  $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        //
    }

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
        return redirect()->back();
    }


    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}