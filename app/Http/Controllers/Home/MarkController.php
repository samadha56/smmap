<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\MarksUpdateRequest;
use App\Models\Mark;

class MarkController extends Controller
{
    public function index()
    {
        $marks = Mark::all();
        return view('marks', compact('marks'));
    }

    public function edit()
    {
        $marks = Mark::all();
        return view('home.map.marks.edit', compact('marks'));
    }

    public function update(MarksUpdateRequest $request)
    {
        Mark::truncate();
        $validated = $request->validated();

        if (isset($validated['lat'])){
            foreach ($validated['lat'] as $key => $value) {
                Mark::create([
                    'lat' => $value,
                    'lng' => $validated['lng'][$key],
                    'description' => $validated['description'][$key],
                ]);
            }
        }

        return back()->withSuccess('Map Updated Successfully');
    }
}
