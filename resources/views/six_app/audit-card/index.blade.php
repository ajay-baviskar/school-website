@extends('layouts.six_main')
@section('m1','Master')
@section('m2',$title)
@section('title',$title)


@section('content')
<style type="text/css">
    table#job-data-table,.paging_simple_numbers {
        display: none;
    }
</style>
<!-- Hidden Table for DataTables Integration -->
<table id="job-data-table" class="display">
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Company</th>
            <th>Location</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <?php
            $getAuditorData = $val->getAuditorData;
            $getChampData = $val->getChampData;
        ?>
        <tr>
            <td>{{$val->getChampData->name.' - '.date('d-m-Y',strtotime($val->date))}}</td>
            <td>{{$getChampData->getDepartment()}}</td>
            <td>{{$getChampData->getPlant()}}</td>
            <td>$300 - $900 / month</td>
        </tr>
        @endforeach
        <!-- Add rows corresponding to each job-card -->
    </tbody>
</table>
<div class="row" id="jobgrid-list">
    @foreach($data as $val)
    
    
    <div class="col-xl-3 col-md-6 job-card" data-job-title="{{$val->getChampData->name.' - '.date('d-m-Y',strtotime($val->date))}}" data-company="{{$getChampData->getDepartment()}}" data-location="{{$getChampData->getPlant()}}" data-salary="$250 - $800 / month">
        <div class="card">
            <div class="card-body">
                <div class="favorite-icon">
                    <a href="javascript:void(0)"><i class="uil uil-heart-alt fs-18"></i></a>
                </div>
                <img src="assets/images/companies/adobe.svg" alt="" height="50" class="mb-3">
                <h5 class="fs-17 mb-2"><a href="javascript:void(0);" class="text-dark">{{$val->getChampData->name.' - '.date('d-m-Y',strtotime($val->date))}}</a></h5>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <p class="text-muted fs-14 mb-1">{{$getChampData->getDepartment()}}</p>
                    </li>
                    <li class="list-inline-item">
                        <p class="text-muted fs-14 mb-0"><i class="mdi mdi-map-marker"></i> {{$getChampData->getPlant()}}</p>
                    </li>
                    <li class="">
                        <p class="text-muted fs-14 mb-0"><i class="uil uil-wallet"></i> Score=>{{$val->total_score }}</p>
                    </li>
                </ul>
                <div class="mt-3 hstack gap-2">
                    <span class="badge rounded-1 badge-soft-success">{{$val->status}}</span>
                    <!-- <span class="badge rounded-1 badge-soft-warning">Urgent</span> -->
                    <!-- <span class="badge rounded-1 badge-soft-info">Private</span> -->
                </div>
                <div class="mt-4 hstack gap-2">
                    <a href="{{route('audit-card.show',$val->id)}}"  class="btn btn-soft-success w-100">View Card Details</a>
                    <!-- <a href="#applyJobs" data-bs-toggle="modal" class="btn btn-soft-primary w-100">Apply Now</a> -->
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection
@section('css')
   @include('layouts.css') 
@endsection
@section('js')
@include('layouts.js')
    <!-- jQuery and DataTables scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            // Initialize DataTable on the hidden table
            var table = $('#job-data-table').DataTable({
                dom: '<"top"f>t<"bottom"p><"clear">',
                paging: true,
                ordering: false,
                searching: true,
                pageLength: 6,
                columnDefs: [
                    { targets: "_all", orderable: false }
                ]
            });

            // Filter job cards based on DataTable search
            $('#job-data-table_filter input').on('keyup', function() {
                table.search(this.value).draw();
                filterCards();
            });

            // Function to filter job cards
            function filterCards() {
                var filteredData = table.rows({ search: 'applied' }).data().toArray();
                $('.job-card').hide();
                filteredData.forEach(function(row) {
                    $('.job-card').filter(function() {
                        return $(this).data('job-title') === row[0];
                    }).show();
                });
            }
        });
    </script>
@endsection
