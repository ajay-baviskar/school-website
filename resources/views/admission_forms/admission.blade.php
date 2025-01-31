@extends('layouts.theme')

@section('content')
    <div class="jumbotron" style="background: url({{ url('public/theme/img/admission.png') }}) no-repeat; background-size: cover; background-position: top center;">
        <div class="container">
            <div class="col-lg-6 col-centered text-center">
                <h1 class="text-light">Admission Management</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admission Management</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="section-heading text-center my-5">
            <h2>Admission Forms</h2>
        </div>

        <div class="row">
            <div class="col-md-6 mb-6">
                <div class="card h-100 shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Primary Admission Form</h5>
                        <p class="card-text">Download the admission form for primary school.</p>
                        <a href="{{ asset('forms/primary_admission_form.pdf') }}" class="btn btn-primary" download>Download Form</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-6">
                <div class="card h-100 shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Primary & Secondary Admission Form</h5>
                        <p class="card-text">Download the combined admission form for primary and secondary school.</p>
                        <a href="{{ asset('forms/primary_secondary_admission_form.pdf') }}" class="btn btn-primary" download>Download Form</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5 shadow">
            <div class="card-header bg-primary text-light text-center">
                <h5>Upload Required Documents</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('upload.documents') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="filled_form" class="form-label">Filled Admission Form (PDF):</label>
                            <input type="file" name="filled_form" id="filled_form" class="form-control" accept=".pdf" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="aadhaar" class="form-label">Aadhaar Card (PDF/Image):</label>
                            <input type="file" name="aadhaar" id="aadhaar" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="leaving_certificate" class="form-label">Leaving Certificate (PDF/Image):</label>
                            <input type="file" name="leaving_certificate" id="leaving_certificate" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="birth_certificate" class="form-label">Birth Certificate (PDF/Image):</label>
                            <input type="file" name="birth_certificate" id="birth_certificate" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-5">Upload Documents</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
