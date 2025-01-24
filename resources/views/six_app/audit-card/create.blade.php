@extends('layouts.six_main')
@section('m1','Master')
@section('m2',$title)
@section('title',$title)


@section('content')

<div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
            
                <div class="card-body">
                    <div class="d-sm-flex flex-wrap">
                        <!-- <h4 class="card-title mb-4">Email Sent</h4> -->
                        <div class="ms-auto">
                            <a href="{{ route('audit-card.index') }}" class="btn btn-primary waves-effect waves-light" >Back</a>
                        </div>
                    </div>
                    <br>
                    {!! Form::open(array('route' => 'audit-card.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('text', 'Select Date', ['class' => 'form-control-label']) }}
                                    {{ Form::date('date',  null, [ 'class'=> 'form-control select_date', "required"=>"true"]) }}
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="row form_html">
                            
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    jQuery(document).ready(function(){
        $(".select_date").on('change',function(){
            // alert($(this).val());
            if ($(this).val() == '') {
                return false;
            }
            $('.form_html').html('');
            $.ajax({
                url: '{{ route("audit-card-data") }}?date='+$(this).val(), // Use Laravel route helper to generate the URL
                type: 'GET', // Or 'POST' if you need to send data
                success: function(response) {

                    // $('.not_mapped').show();
                    // $('.not_mapped').hide();
                    $('.form_html').html(response);
                    // $('.save-btn').on('click',function(){
                    //     let champion_user_id= $(this).attr('champion_user_id');
                    //     let dataByNameKey = {};

                    //     $('input[name^="user['+champion_user_id+']"], select[name^="user['+champion_user_id+']"]').each(function() {
                    //         let name = $(this).attr('tag');
                    //         let value = $(this).val();
                    //         dataByNameKey[name] = value;
                    //     });
                    //     console.log(dataByNameKey);
                    //     $.ajax({
                    //         url: "{{route('auditor-mapping.store')}}", // Replace with your route URL
                    //         method: 'POST',
                    //         data: {
                    //             data: dataByNameKey,
                    //             _token: '{{ csrf_token() }}' // Laravel CSRF token
                    //         },
                    //         success: function(response) {
                    //             Swal.fire(response.msg);
                    //             console.log(response); // Handle success response
                    //         },
                    //         error: function(xhr, status, error) {
                    //             Swal.fire(error);
                    //             console.error(error); // Handle error response
                    //         }
                    //     });
                    // });
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