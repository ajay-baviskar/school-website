@extends('layouts.main')
@section('m1', 'Master')
@section('m2', 'Holidays')
@section('content')

<div id="addModal" class="modal fade" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('holidays.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Holiday</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                @include('holidays.form')
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-5">
            <div class="card-body">
                <div class="d-sm-flex flex-wrap">
                    <div class="ms-auto">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Holiday</button>
                    </div>
                </div>
                <br>
                <table class="table table-bordered dt-responsive nowrap w-100" id="datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Holiday Date</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($holidays as $holiday)
                        <tr>
                            <td>{{ $holiday->title }}</td>
                            <td>{{ $holiday->description }}</td>
                            <td>{{ $holiday->holiday_date }}</td>
                            <td>{{ ucfirst($holiday->type) }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $holiday->id }}">Edit</button>
                                <form action="{{ route('holidays.destroy', $holiday->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div id="editModal{{ $holiday->id }}" class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <form action="{{ route('holidays.update', $holiday->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Holiday</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        @include('holidays.form', ['holiday' => $holiday])
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
