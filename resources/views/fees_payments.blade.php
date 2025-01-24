@extends('layouts.main')
@section('m1','Master')
@section('m2',$title)
@section('title',$title)
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <table class="table table-bordered dt-responsive  nowrap w-100 " id="datatable" >
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Roll No</th>
                                    <th scope="col">Standard</th>
                                    <th scope="col">Remark</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Payment ID</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($data as $val)
                                    <tr data-id="{{ $val->id }}">
                                        <td data-field="student_name">{{ $val->student_name }}</td>
                                        <td data-field="roll_no">{{ $val->roll_no }}</td>
                                        <td data-field="standard">{{ $val->standard }}</td>
                                        <td data-field="remark">{{ $val->remark }}</td>
                                        <td data-field="amount">{{ $val->amount }}</td>
                                        <td data-field="transaction_date">{{ $val->transaction_date }}</td>
                                        <td data-field="payment_id">{{ $val->payment_id }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->


@endsection
@section('css')

   @include('layouts.css') 
@endsection
@section('js')
@include('layouts.js')
    
@endsection
