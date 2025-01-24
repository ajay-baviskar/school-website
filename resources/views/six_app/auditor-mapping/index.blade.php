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
                    <div class="text-center mb-5">
                        <!-- <h4 class="card-title mb-4">Email Sent</h4> -->
                        <!-- <div class="ms-auto">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addModal">Add</button>
                        </div> -->
                        <div class="form-group col-lg-6">
                            <label>Select Month</label>
                            <select id="select_month" class="form-control">
                                <option value="">Select</option>
                                @foreach($data as $val)
                                <option value="{{ $val->month }}">{{ date('F Y',strtotime($val->month)) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            
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
    jQuery(document).ready(function(){
        $("#select_month").on('change',function(){
            // alert($(this).val());
            if ($(this).val() == '') {
                return false;
            }
            $.ajax({
                url: '{{ route("auditor-mapping-data") }}?month='+$(this).val(), // Use Laravel route helper to generate the URL
                type: 'GET', // Or 'POST' if you need to send data
                success: function(response) {
                    $('#custom-tabs-one-home').html(response);
                    $('.save-btn').on('click',function(){
                        let champion_user_id= $(this).attr('champion_user_id');
                        let dataByNameKey = {};

                        $('input[name^="user['+champion_user_id+']"], select[name^="user['+champion_user_id+']"]').each(function() {
                            let name = $(this).attr('tag');
                            let value = $(this).val();
                            dataByNameKey[name] = value;
                        });
                        console.log(dataByNameKey);
                        $.ajax({
                            url: "{{route('auditor-mapping.store')}}", // Replace with your route URL
                            method: 'POST',
                            data: {
                                data: dataByNameKey,
                                _token: '{{ csrf_token() }}' // Laravel CSRF token
                            },
                            success: function(response) {
                                Swal.fire(response.msg);
                                console.log(response); // Handle success response
                            },
                            error: function(xhr, status, error) {
                                Swal.fire(error);
                                console.error(error); // Handle error response
                            }
                        });
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error); // Handle errors
                }
            });
        });
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
