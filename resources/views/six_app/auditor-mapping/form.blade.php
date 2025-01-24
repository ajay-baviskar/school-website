    <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('text', 'Month', ['class' => 'form-control-label']) }}
                    {{ Form::month('month', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('text', 'Status', ['class' => 'form-control-label']) }}
                    {{ Form::select('status', ['1'=>'Active','0'=>'In-active'], null, [ 'class'=> 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('text', 'W1 Start', ['class' => 'form-control-label']) }}
                    {{ Form::date('w1_start', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('text', 'W1 End', ['class' => 'form-control-label']) }}
                    {{ Form::date('w1_end', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('text', 'W2 Start', ['class' => 'form-control-label']) }}
                    {{ Form::date('w2_start', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('text', 'W2 End', ['class' => 'form-control-label']) }}
                    {{ Form::date('w2_end', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('text', 'W3 Start', ['class' => 'form-control-label']) }}
                    {{ Form::date('w3_start', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('text', 'W3 End', ['class' => 'form-control-label']) }}
                    {{ Form::date('w3_end', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('text', 'W4 Start', ['class' => 'form-control-label']) }}
                    {{ Form::date('w4_start', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('text', 'W4 End', ['class' => 'form-control-label']) }}
                    {{ Form::date('w4_end', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('text', 'W5 Start', ['class' => 'form-control-label']) }}
                    {{ Form::date('w5_start', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('text', 'W5 End', ['class' => 'form-control-label']) }}
                    {{ Form::date('w5_end', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>