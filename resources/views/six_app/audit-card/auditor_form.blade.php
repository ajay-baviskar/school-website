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
                    {!! Form::model($AuditCard, ['method' => 'PATCH','route' => ['audit-card.update', $AuditCard->id]]) !!}
                                                @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('text', 'Date', ['class' => 'form-control-label']) }}
                                    {{ Form::date('date',  null, [ 'class'=> 'form-control select_date', "readonly"=>"true"]) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('text', 'Status', ['class' => 'form-control-label']) }}
                                    {{ Form::select('status', ['Pending'=>'Pending','Complete'=>'Complete'], null, [ 'class'=> 'form-control','required'=>true]) }}
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="row form_html">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-rep-plugin">
                                        <center>
                                            <strong class="text-info">Daily 6sAudit Card</strong>
                                        </center>
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Question</th>
                                                    <th data-priority="1">Max Score</th>
                                                    <th data-priority="1">Score By Champion</th>
                                                    @role('6S Auditor') 
                                                    <th data-priority="3">Enter Your Score</th>
                                                    @else
                                                    <th data-priority="1">Score By Auditor</th>
                                                    @endif
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($q_cat_data as $q_cat_datas)
                                                    <tr style="background-color:orange;">
                                                        <td colspan="4" class="text-center">{{$q_cat_datas->name}}</td>
                                                    </tr>
                                                        @foreach($q_cat_datas->questions as $q_cat_questions)
                                                        <input type="hidden" name="questions_data[{{$q_cat_questions->id}}][id]" value="{{$q_cat_questions->id}}">
                                                        <input type="hidden" name="questions_data[{{$q_cat_questions->id}}][score]" value="{{$q_cat_questions->score}}">
                                                        <input type="hidden" name="questions_data[{{$q_cat_questions->id}}][score_given_by_champion]" value="{{$questions_data[$q_cat_questions->id]['score_given_by_champion']}}">
                                                            <tr>
                                                                <th>{{ $q_cat_questions->desc }}</th>
                                                                <td>{{ $q_cat_questions->score }}</td>
                                                                <td>{{ $questions_data[$q_cat_questions->id]['score_given_by_champion'] }}</td>
                                                                @role('6S Auditor') 
                                                                <td>
                                                                    <div class="form-group">
                                                                        {{ Form::number('questions_data['.$q_cat_questions->id.'][score_given_by_auditor]', (isset($questions_data[$q_cat_questions->id])?$questions_data[$q_cat_questions->id]['score_given_by_auditor']:null), ['class' => 'form-control','required'=>true,'max'=>$q_cat_questions->score]) }}
                                                                    </div>
                                                                </td>
                                                                @else
                                                                <td>{{ $questions_data[$q_cat_questions->id]['score_given_by_auditor'] }}</td>
                                                                @endrole
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Observation Details</h4>
                                                    <div data-repeater-list="group-a"  id="formRepeater">
                                                        @if($observation)
                                                        @foreach($observation['area'] as $k=> $observation_data)
                                                        @if($k > 0)
                                                        <div class="form-group row">
                                                        @endif
                                                        <div data-repeater-item class="row">
                                                            <div  class="mb-2 col-lg-2">
                                                                <label for="name">Area</label>
                                                                <input type="text"  name="observation[area][]" value="{{ @$observation['area'][$k] }}" class="form-control" placeholder="Enter Area"/>
                                                            </div>
                
                                                            <div  class="mb-3 col-lg-2">
                                                                <label for="email">Concern/Observation/Issue</label>
                                                                <textarea name="observation[issue][]" class="form-control" placeholder="Enter Your Observation">{{ @$observation['issue'][$k] }}</textarea>
                                                            </div>
                
                                                            <div  class="mb-3 col-lg-2">
                                                                <label for="subject">Action Taken/Required</label>
                                                                <textarea name="observation[action][]" class="form-control" placeholder="">{{ @$observation['action'][$k] }}</textarea>
                                                            </div>
                
                                                            <div class="mb-1 col-lg-2">
                                                                <label for="resume">Responsbility</label>
                                                                <select name="observation[responsible][]" class="form-control">
                                                                    @foreach($owner_data as $user)
                                                                    <option value="{{ $user->id }}" @if(@$observation['status'][$k] == $user->id) selected @endif>{{ $user->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                
                                                            <div class="mb-1 col-lg-2">
                                                                <label for="message">Target Date</label>
                                                                <input type="date" value="{{ @$observation['target_date'][$k] }}"  name="observation[target_date][]" class="form-control" />
                                                            </div>
                                                            <div class="mb-1 col-lg-2">
                                                                <label for="message">Status</label>
                                                                <select class="form-control" name="observation[status][]">
                                                                    <option value="Complete" @if(@$observation['status'][$k] == 'Complete') selected @endif >Complete</option>
                                                                    <option value="Pending" @if(@$observation['status'][$k] == 'Pending') selected @endif>Pending</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-lg-2">
                                                                <label for="message">Updates/Next Steps</label>
                                                                <textarea name="observation[step][]" class="form-control" >{{ @$observation['step'][$k] }}</textarea>
                                                            </div>
                                                            @if($k > 0)
                                                                @role('6S Auditor')  
                                                                <div class="col-lg-2 align-self-center">
                                                                    <div class="d-grid">
                                                                        <input data-repeater-delete type="button" class="btn btn-primary remove-field" value="Delete"/>
                                                                    </div>
                                                                </div>
                                                                @endrole
                                                            @endif
                                                        </div>
                                                        @if($k > 0)
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                        @else
                                                        <div data-repeater-item class="row">
                                                            <div  class="mb-2 col-lg-2">
                                                                <label for="name">Area</label>
                                                                <input type="text"  name="observation[area][]" class="form-control" placeholder="Enter Area"/>
                                                            </div>
                
                                                            <div  class="mb-3 col-lg-2">
                                                                <label for="email">Concern/Observation/Issue</label>
                                                                <textarea name="observation[issue][]" class="form-control" placeholder="Enter Your Observation"></textarea>
                                                            </div>
                
                                                            <div  class="mb-3 col-lg-2">
                                                                <label for="subject">Action Taken/Required</label>
                                                                <textarea name="observation[action][]" class="form-control" placeholder=""></textarea>
                                                            </div>
                
                                                            <div class="mb-1 col-lg-2">
                                                                <label for="resume">Responsbility</label>
                                                                <select name="observation[responsible][]" class="form-control">
                                                                    @foreach($owner_data as $user)
                                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                
                                                            <div class="mb-1 col-lg-2">
                                                                <label for="message">Target Date</label>
                                                                <input type="date"  name="observation[target_date][]" class="form-control" />
                                                            </div>
                                                            <div class="mb-1 col-lg-2">
                                                                <label for="message">Status</label>
                                                                <select class="form-control" name="observation[status][]">
                                                                    <option value="Complete">Complete</option>
                                                                    <option value="Pending">Pending</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-lg-2">
                                                                <label for="message">Updates/Next Steps</label>
                                                                <textarea name="observation[step][]" class="form-control" ></textarea>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        
                                                    </div>
                                                    @role('6S Auditor')  
                                                    <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" id="addField" value="Add"/>
                                                    @endrole
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->        
                                @role('6S Auditor')  
                                <div class="d-sm-flex flex-wrap">
                                    <button type="submit" class="btn btn-primary ms-auto">Submit</button>
                                </div>
                                @endrole
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
<section id="repeater-html" style="display:none;">
    <div data-repeater-item class="row">
        <div  class="mb-2 col-lg-2">
            <label for="name">Area</label>
            <input type="text"  name="observation[area][]" class="form-control" placeholder="Enter Area"/>
        </div>

        <div  class="mb-3 col-lg-2">
            <label for="email">Concern/Observation/Issue</label>
            <textarea name="observation[issue][]" class="form-control" placeholder="Enter Your Observation"></textarea>
        </div>

        <div  class="mb-3 col-lg-2">
            <label for="subject">Action Taken/Required</label>
            <textarea name="observation[action][]" class="form-control" placeholder=""></textarea>
        </div>

        <div class="mb-1 col-lg-2">
            <label for="resume">Responsbility</label>
            <select name="observation[responsible][]" class="form-control">
                @foreach($owner_data as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-1 col-lg-2">
            <label for="message">Target Date</label>
            <input type="date"  name="observation[target_date][]" class="form-control" />
        </div>
        <div class="mb-1 col-lg-2">
            <label for="message">Status</label>
            <select class="form-control" name="observation[status][]">
                <option value="Complete">Complete</option>
                <option value="Pending">Pending</option>
            </select>
        </div>
        <div class="mb-3 col-lg-2">
            <label for="message">Updates/Next Steps</label>
            <textarea name="observation[step][]" class="form-control" ></textarea>
        </div>
        <div class="col-lg-2 align-self-center">
            <div class="d-grid">
                <input data-repeater-delete type="button" class="btn btn-primary remove-field" value="Delete"/>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    window.onload = function() {
      document.getElementById('addField').addEventListener('click', function() {
        const formRepeater = document.getElementById('formRepeater');
        const newFieldGroup = document.createElement('div');
        newFieldGroup.className = 'form-group row';

        newFieldGroup.innerHTML = $("#repeater-html").html();

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