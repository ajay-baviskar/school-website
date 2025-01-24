@extends('layouts.main')
@section('m1','Master')
@section('m2',$title)
@section('title',$title)
@section('content')
<div id="addModal" class="modal fade" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <form action="{{ route('questions.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-content">
      <div class="card-header">
        <h5 class="card-title" id="exampleModalLabel">Create {{$title}}</h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      @include('six_app.questions.form')
    </div>
     </form>
  </div>
</div>
    <div class="row">
        <div class="container card form-data-div">
        
        </div>
        <div class="col-md-12">
            <div class="card mb-5">
            
                <div class="card-body">
                    <div class="d-sm-flex flex-wrap">
                        <!-- <h4 class="card-title mb-4">Email Sent</h4> -->
                        <div class="ms-auto">
                            <a class="btn btn-info btn-sm m-1 pop"  href="{{ route('questions.create') }}">
                                <i class="fa fa-plus" aria-hidden="true"></i>Add
                            </a>
                            <button type="button" class="pop btn btn-primary waves-effect waves-light" mod="#addModal">Add</button>
                            <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addModal">Add</button> -->
                        </div>
                    </div>
                    <br>
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <table class="table table-bordered dt-responsive  nowrap w-100 " id="datatable" >
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Main Category</th>
                                    <th scope="col">Section</th>
                                    <th scope="col">Desc</th>
                                    <th scope="col">Field Type</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($data as $val)
                                    <tr data-id="{{ $val->id }}">
                                        <td data-field="name">{{ $val->getType->name }}</td>
                                        <td data-field="name">{{ $val->getCat->name }}</td>
                                        <td data-field="name">{{ $val->desc }}</td>
                                        <td data-field="name">{{ @$val->getFieldType->name }}</td>
                                        <td data-field="url_name">
                                            @if($val->status == 1)
                                            <span class="badge badge-pill badge-soft-success font-size-11">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- <button type="button" class="btn btn-info btn-sm m-1 pop" mod="#designation_edit{{ $val->id }}" action="{{ route('questions.update', $val->id) }}" > -->
                                            <a class="btn btn-info btn-sm m-1 pop"  href="{{ route('questions.edit', $val->id) }}">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <div id="designation_edit{{ $val->id }}" class="modal fade" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" style="display: none;">
                                              <div class="modal-dialog" role="document">
                                                {!! Form::model($val, ['method' => 'PATCH','route' => ['questions.update', $val->id]]) !!}
                                                @csrf
                                                <div class="card-content">
                                                  <div class="card-header">
                                                    <h5 class="card-title" id="exampleModalLabel">Update Data</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                  </div>
                                                  @include('six_app.questions.form')
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
        window.onload = function() {
          document.getElementById('addField').addEventListener('click', function() {
            const formRepeater = document.getElementById('formRepeater');
            const newFieldGroup = document.createElement('div');
            newFieldGroup.className = 'form-group row';

            newFieldGroup.innerHTML = `<div data-repeater-item class="row">
                                            <div  class="mb-12 col-lg-12">
                                                <label for="name">Option</label>
                                                <input type="text"  name="option[][]" class="form-control" placeholder="Enter Options"/>
                                            </div>
                                            <div class="col-lg-2 align-self-center">
                                                <div class="">
                                                    <input data-repeater-delete type="button" class="btn btn-primary remove-field" value="Delete"/>
                                                </div>
                                            </div>
                                        </div>`;
            console.log('anil');
            formRepeater.appendChild(newFieldGroup);
          });

          document.getElementById('formRepeater').addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('remove-field')) {
              event.target.closest('.form-group').remove();
            }
          });
        };
      </script>
<script>

    jQuery(document).ready(function(){
        $(".select21").select2();
        $('.pop').on('click', function(e){
            let id = $(this).attr('mod');
            let form = $(this).attr('action');
            $(".select21").select2('destroy');
            if (form) {
                let html = `
                    <form action="${form}" method = "PATCH" >
                    @csrf 
                    ${$(id+' .modal-dialog').html()}
                    </form>
                `;
                $('.form-data-div').html('');
                $('.form-data-div').html(html);
                console.log(html);
            }else{  
                $('.form-data-div').html($(id+' .modal-dialog').html());
             
            }
            
            
            $(".select21").select2();
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
