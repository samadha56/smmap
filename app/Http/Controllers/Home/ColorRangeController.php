<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\ColorRangeUpdateRequest;
use App\Imports\ColorRangeImport;
use App\Models\ColorRange;
use Maatwebsite\Excel\Facades\Excel;

class ColorRangeController extends Controller
{
    public function index()
    {
        $datas = ColorRange::all();
        return view('color-range', compact('datas'));
    }

    public function edit()
    {
        return view('home.map.color-range.edit');
    }

    public function update(ColorRangeUpdateRequest $request)
    {
        Excel::import(new ColorRangeImport, $request->file('uploadExcel'));
        return back()->withSuccess('Map Updated Successfully');
    }
}
