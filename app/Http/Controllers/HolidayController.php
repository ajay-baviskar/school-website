<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    //
    public function index()
{
    $holidays = Holiday::all();
    return view('holidays.index', compact('holidays'));
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'holiday_date' => 'required|date',
        'type' => 'required|in:regular,non_instruction,sunday_falling',
    ]);

    Holiday::create($request->all());

    return redirect()->back()->with('success', 'Holiday added successfully.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'holiday_date' => 'required|date',
        'type' => 'required|in:regular,non_instruction,sunday_falling',
    ]);

    $holiday = Holiday::findOrFail($id);
    $holiday->update($request->all());

    return redirect()->back()->with('success', 'Holiday updated successfully.');
}

public function destroy($id)
{
    Holiday::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'Holiday deleted successfully.');
}

}
