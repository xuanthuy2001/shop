<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        return view('layout.admin.slider.list', [
            'title' => ' danh sách slider',
            'sliders' => $this->slider->getAll()
        ]);
    }

    public function create()
    {
        return view('layout.admin.slider.add', [
            'title' => "trang tạo slider"
        ]);
    }

    public function store(SliderRequest $request)
    {
        $result = $this->slider->insert($request);
        if ($result === false) {
            return redirect()->back();
        }
        return redirect()->route('sliders.list');
    }

    public function show(Slider $slider)
    {
        dd($slider);
        return   view('layout.admin.slider.edit', [
            'title' => 'trang chỉnh sửa slider',
            'slider' => $slider,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $result = $this->slider->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'xóa  thành công '
            ]);
        }

        return response()->json(['error' => true]);
    }
}