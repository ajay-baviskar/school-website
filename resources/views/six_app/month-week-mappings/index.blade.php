@extends('layouts.six_main')
@section('m1','Master')
@section('m2',$title)
@section('title',$title)
@section('content')
<div id="addModal" class="modal fade" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-fullscreen" role="document">
    <form action="{{ route('month-week-mappings.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create {{$title}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      @include('six_app.month-week-mappings.form')
    </div>
     </form>
  </div>
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
            
                <div class="card-body">
                    <div class="d-sm-flex flex-wrap">
                        <!-- <h4 class="card-title mb-4">Email Sent</h4> -->
                        <div class="ms-auto">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addModal">Add</button>
                        </div>
                    </div>
                    <br>
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <table class="table table-bordered dt-responsive  nowrap w-100 " id="datatable" >
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Month</th>
                                    <th scope="col">Week 1</th>
                                    <th scope="col">Week 2</th>
                                    <th scope="col">Week 3</th>
                                    <th scope="col">Week 4</th>
                                    <th scope="col">Week 5</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($data as $val)
                                    <tr data-id="{{ $val->id }}">
                                        <td data-field="name">{{ $val->month }}</td>
                                        <td data-field="min_score">{{ $val->w1_start }} - {{ $val->w1_end }}</td>
                                        <td data-field="max_score">{{ $val->w2_start }} - {{ $val->w2_end }}</td>
                                        <td data-field="max_score">{{ $val->w3_start }} - {{ $val->w3_end }}</td>
                                        <td data-field="max_score">{{ $val->w4_start }} - {{ $val->w4_end }}</td>
                                        <td data-field="max_score">{{ $val->w5_start }} - {{ $val->w5_end }}</td>
                                        <td data-field="url_name">
                                            @if($val->status == 1)
                                            <span class="badge badge-pill badge-soft-success font-size-11">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm m-1" data-bs-toggle="modal" data-bs-target="#designation_edit{{ $val->id }}" href="#">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            {!! Form::open(['route' => ['month-week-mappings.destroy', $val],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}

                                            <button type="submit" class="btn delete btn-danger btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Delete Designation" href="">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                        <div id="designation_edit{{ $val->id }}" class="modal fade" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" style="display: none;">
                                              <div class="modal-dialog modal-fullscreen" role="document">
                                                {!! Form::model($val, ['method' => 'PATCH','route' => ['month-week-mappings.update', $val->id]]) !!}
                                                @csrf
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  @include('six_app.month-week-mappings.form')
                                                </div>
                                                {!! Form::close() !!}
                                              </div>
                                            </div>
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

<script>
    function getLastDateOfMonth(monthYear) {
        // Split the input '2024-12' into year and month
        let [year, month] = monthYear.split("-");
        month = parseInt(month); // Convert month to a number

        // Create a date object for the first day of the next month
        let date = new Date(year, month, 0); // The 0th day of the next month gives the last day of the current month

        // Format the date to "dd-mm-yyyy"
        return formatDate(date);
    }
    function formatDate(date) {
            let day = String(date.getDate()).padStart(2, '0');
            let month = String(date.getMonth() + 1).padStart(2, '0'); // Month is 0-indexed
            let year = date.getFullYear();
            // return `${day}-${month}-${year}`;
            return `${year}-${month}-${day}`;
        }
    $(document).ready(function() {

    // Trigger this function when the month changes
        $('input[name="month"]').change(function() {
            let selectedMonth = $(this).val(); // Get selected month value in "yyyy-mm" format
            if (selectedMonth) {
                let [year, month] = selectedMonth.split("-");
                month = parseInt(month) - 1; // Convert month to zero-based index

                // Initialize the first date of the selected month
                let date = new Date(year, month, 1);

                // Array to store start and end dates for each week
                let weekDates = [];

                // Loop to calculate the weekly dates
                while (date.getMonth() === month) {
                    let weekStart = new Date(date);
                    
                    // Set the week end date to 6 days after the start date or end of month
                    let weekEnd = new Date(date);
                    weekEnd.setDate(weekEnd.getDate() + 6);

                    // Ensure week end does not exceed the month's end
                    if (weekEnd.getMonth() !== month) {
                        weekEnd = new Date(year, month + 1, 0); // Last day of month
                    }

                    // Push to the array in format of "dd-mm-yyyy"
                    weekDates.push({
                        start: formatDate(weekStart),
                        end: formatDate(weekEnd)
                    });

                    // Move to the next week
                    date.setDate(date.getDate() + 7);
                }

                // Populate the form fields with the calculated dates
                for (let i = 0; i < 5; i++) {
                    $(`input[name="w${i + 1}_start"]`).val(weekDates[i] ? weekDates[i].start : '');
                    $(`input[name="w${i + 1}_end"]`).val(weekDates[i] ? weekDates[i].end : '');
                    $(`input[name="w${i + 1}_end"]`).attr('min',selectedMonth+'-01');
                    $(`input[name="w${i + 1}_start"]`).attr('min',selectedMonth+'-01');
                    $(`input[name="w${i + 1}_start"]`).attr('max',getLastDateOfMonth(selectedMonth));
                    $(`input[name="w${i + 1}_end"]`).attr('max',getLastDateOfMonth(selectedMonth));
                }
            }
        });

        // Helper function to format date to "dd-mm-yyyy"
        
    });

    jQuery(document).ready(function(){
        $('.delete').on('click', function(e){
            e.preventDefault();
            let that = jQuery(this);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Yes, do it!"
            }).then(function(t) {
                if (t.value) {
                    that.parent('form').submit();
                    Swal.fire("Deleted!", "Your file has been deleted.", "success");
                } else {
                    Swal.fire("Your Data is safe!");
                }
            });
        });
    })

</script>
@endsection
