<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddSliderRequest;
use App\Http\Requests\Admin\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(AddSliderRequest $request)
    {
        $inputs = $request->only('title', 'description', 'image');

        $inputs['image'] = ltrim($request->file('image')->store('public/sliders'), 'public/');

        Slider::create($inputs);

        return redirect()->route('admin.sliders.index')->with('success', 'Added successfully!');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $inputs = $request->only('title', 'description');

        if ($request->file('image')) {
            if ($slider->image && file_exists(storage_path("app/public/{$slider->getOriginal('image')}"))) {
                Storage::delete('public/' . $slider->getOriginal('image'));
            }

            $inputs['image'] = ltrim($request->file('image')->store('public/sliders'), 'public/');
        }

        $slider->update($inputs);

        return redirect()->back()->with('success', 'Updated successfully!');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->back()->with('success', 'Deleted successfully!');
    }
}