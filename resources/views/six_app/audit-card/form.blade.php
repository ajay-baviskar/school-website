
<div class="row">
    <input type="hidden" name="auditor_id" value="{{ $auditor_id }}">
    <input type="hidden" name="champion_user_id" value="{{ $champion_user_id }}">
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
                        <th data-priority="3">Enter Your Score</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($q_cat_data as $q_cat_datas)
                        <tr style="background-color:orange;">
                            <td colspan="3" class="text-center">{{$q_cat_datas->name}}</td>
                        </tr>
                            @foreach($q_cat_datas->questions as $q_cat_questions)
                            <input type="hidden" name="questions_data[{{$q_cat_questions->id}}][id]" value="{{$q_cat_questions->id}}">
                            <input type="hidden" name="questions_data[{{$q_cat_questions->id}}][score]" value="{{$q_cat_questions->score}}">
                            <input type="hidden" name="questions_data[{{$q_cat_questions->id}}][score_given_by_auditor]" value="0">
                                <tr>
                                    <th>{{ $q_cat_questions->desc }}</th>
                                    <td>{{ $q_cat_questions->score }}</td>
                                    <td>
                                        <div class="form-group">
                                            {{ Form::number('questions_data['.$q_cat_questions->id.'][score_given_by_champion]', (isset($questions_data[$q_cat_questions->id])?$questions_data[$q_cat_questions->id]['score_given_by_champion']:null), ['class' => 'form-control','required'=>true,'max'=>$q_cat_questions->score]) }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>            
    <div class="col-xs-6 col-sm-6 col-md-6 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>