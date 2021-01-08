<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class UnitController extends Controller
{
    public function addUnit(Request $request, $id)
    {
        $course = Course::find($id);

        $prefix = date('ym') . $course->course_code;
        $unit_code = IdGenerator::generate(['table' => 'units', 'field' => 'unit_code', 'length' => 20, 'prefix' => $prefix]);

        $unit = new Unit();
        $unit->course_id = $course->id;
        $unit->unit_code = $unit_code;
        $unit->name = $request->unit_name;
        $unit->description = $request->unit_description;
        $unit->save();
        return back();
    }

    public function viewUnit($course_code, $unit_code)
    {
        $unit = Unit::where('unit_code', $unit_code)->first();
        return view('dashboard.course.unit', compact('unit'));
    }
}
