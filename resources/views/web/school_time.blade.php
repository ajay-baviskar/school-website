@extends('layouts.theme')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="mb-4">School Timings</h1>
            <p class="text-muted">Find the detailed timings for each section of Sharada English School below.</p>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Pre-school Timings -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Clerk Office Timing</h4>
                </div>
                <div class="card-body text-center">
                    <p><strong>Monday - Saturday:</strong></p>
                    <p><strong>(No Cash Payment will be accepted by school)</strong></p>

                    <p>8:00 AM - 02:30 PM</p>
                </div>
            </div>
        </div>

        <!-- Primary School Timings -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h4>Primary School</h4>
                </div>
                <div class="card-body text-center">
                    <p><strong>Monday - Saturday:</strong></p>
                    <p>8:00 AM - 02:30 PM</p>
                </div>
            </div>
        </div>

        <!-- Secondary School Timings -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white text-center">
                    <h4>Secondary School</h4>
                </div>
                <div class="card-body text-center">
                    <p><strong>Monday - Saturday:</strong></p>
                    <p>8:00 AM - 02:30 PM</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Notes -->
        <div class="col-12">
            <div class="alert alert-info text-center">
                <strong>Note:</strong> The timings are subject to change. Please contact the school office for the most updated schedule.
            </div>
        </div>
    </div>
</div>
@endsection
