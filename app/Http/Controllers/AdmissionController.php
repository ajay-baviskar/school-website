<?php

namespace App\Http\Controllers;

use App\Models\AdmissionDocument;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    //

    public function index()
    {
        // Fetch all admission data
        $admissions = AdmissionDocument::all();

        // Return the view with data
        return view('admission_forms.admission-data', compact('admissions'));
    }

    public function destroy($id)
    {
        // Find the admission entry
        $admission = AdmissionDocument::findOrFail($id);

        // Delete files from storage
        @unlink(public_path($admission->filled_form));
        @unlink(public_path($admission->aadhaar));
        @unlink(public_path($admission->leaving_certificate));
        @unlink(public_path($admission->birth_certificate));

        // Delete the record
        $admission->delete();

        return redirect()->route('admissions.index')->with('success', 'Admission record deleted successfully!');
    }
}
