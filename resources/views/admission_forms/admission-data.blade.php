@extends('layouts.main')
@section('m1', 'Master')
@section('m2', 'Admissions')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-5">
            <div class="card-body">
                <div class="section-heading text-center my-3">
                    <h5>Uploaded Admission Data</h5>
                </div>
                <br>
                <table class="table table-bordered dt-responsive nowrap w-100" id="datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>Student Name</th>
                            <th>Filled Form</th>
                            <th>Aadhaar</th>
                            <th>Leaving Certificate</th>
                            <th>Birth Certificate</th>
                            <th>Uploaded At</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admissions as $admission)
                        <tr>
                            <td>{{ $admission->student_name }}</td>
                            <td>
                                <a href="{{ asset($admission->filled_form) }}" class="btn btn-primary btn-sm" download>Download</a>
                            </td>
                            <td>
                                <a href="{{ asset($admission->aadhaar) }}" class="btn btn-primary btn-sm" download>Download</a>
                            </td>
                            <td>
                                <a href="{{ asset($admission->leaving_certificate) }}" class="btn btn-primary btn-sm" download>Download</a>
                            </td>
                            <td>
                                <a href="{{ asset($admission->birth_certificate) }}" class="btn btn-primary btn-sm" download>Download</a>
                            </td>
                            <td>{{ $admission->created_at->format('d-m-Y H:i') }}</td>
                            {{-- <td>
                                <form action="{{ route('admissions.destroy', $admission->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
