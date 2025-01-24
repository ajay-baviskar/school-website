@extends('layouts.main')
@section('m1','Master')
@section('m2',$title)
@section('title',$title)
@section('content')
<div id="addModal" class="modal fade" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-fullscreen" role="document">
    <form action="{{ route($url.'.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create {{$title}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      @include($url.'.form')
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($data as $val)
                                    <tr data-id="{{ $val->id }}">
                                        <td data-field="name">{{ $val->name }}</td>
                                        <td data-field="date">{{ $val->date }}</td>
                                        <td data-field="url_name">
                                            <a class="btn btn-info btn-sm edit" title="Edit" href="{{ asset($val->url_name) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
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
                                            {!! Form::open(['route' => [$url.'.destroy', $val],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}

                                            <button type="submit" class="btn delete btn-danger btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Delete Designation" href="">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                        <div id="designation_edit{{ $val->id }}" class="modal fade" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" style="display: none;">
                                              <div class="modal-dialog modal-fullscreen" role="document">
                                                {!! Form::model($val, ['method' => 'PATCH',"enctype"=>"multipart/form-data",'route' => [$url.'.update', $val->id]]) !!}
                                                @csrf
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  @include($url.'.form')
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

   @include('layouts.css') 
@endsection
@section('js')
@include('layouts.js')
    
<!-- <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

    <!-- init js -->
    <!-- <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script> -->
<script>
    jQuery(document).ready(function(){
        $('.summer').summernote({
            height : 200,
            codemirror : { theme: 'cyborg' },
            toolbar: [

                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']]

            ]
        });
        // $(".elm1") && tinymce.init({
        //     selector: "textarea.elm1",
        //     height: 350,
        //     // plugins: ["advlist", "autolink", "lists", "link", "image", "charmap", "preview", "anchor", "searchreplace", "visualblocks", "code", "fullscreen", "insertdatetime", "media", "table", "help", "wordcount"],
        //     // toolbar: "undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help",
        //     content_style: 'body { font-family:"Poppins",sans-serif; font-size:16px }'
        // });
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
