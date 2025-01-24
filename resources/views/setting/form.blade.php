@extends('layouts.main')
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
                        
                    </div>
                    <br>
                    {!! Form::open(array('url' => 'save-setting','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {{ Form::label('text', 'Fee Details', ['class' => 'form-control-label']) }}
                                {{ Form::textarea('desc', @$setting->fee_data, ['class' => 'form-control summer','required'=>true]) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {{ Form::label('text', 'Contact Details', ['class' => 'form-control-label']) }}
                                {{ Form::textarea('contact_data', @$setting->contact_data, ['class' => 'form-control summer','required'=>true]) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {{ Form::label('text', 'X link', ['class' => 'form-control-label']) }}
                                {{ Form::text('x_link', @$setting->x_link, ['class' => 'form-control','required'=>true]) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {{ Form::label('text', 'Meta Link', ['class' => 'form-control-label']) }}
                                {{ Form::text('meta_link', @$setting->meta_link, ['class' => 'form-control','required'=>true]) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {{ Form::label('text', 'YouTube Link', ['class' => 'form-control-label']) }}
                                {{ Form::text('youtube_link', @$setting->youtube_link, ['class' => 'form-control','required'=>true]) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {{ Form::label('text', 'FaceBook Link', ['class' => 'form-control-label']) }}
                                {{ Form::text('facebook_link', @$setting->facebook_link, ['class' => 'form-control','required'=>true]) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
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
            height: 200,
            codemirror: { theme: 'cyborg' },
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']] // Add the 'link' option here
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