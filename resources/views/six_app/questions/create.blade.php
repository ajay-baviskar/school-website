@extends('layouts.main')
@section('m1','Master')
@section('m2',$title)
@section('title',$title)
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
            
                <div class="card-body">
                    <br>
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
                                        <div  class="col-md-8">
                                            <label for="name">Option</label>
                                            <input type="text"  name="option[]" class="form-control" placeholder="Enter Options"/>
                                        </div>
                                        <div class="col-md-4" style="margin-top: 25px;">
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
@endsection
