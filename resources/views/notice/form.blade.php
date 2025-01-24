    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Name', ['class' => 'form-control-label']) }}
                    {{ Form::text('name', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Date', ['class' => 'form-control-label']) }}
                    {{ Form::date('date', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Description', ['class' => 'form-control-label']) }}
                    {{ Form::textarea('desc', null, ['class' => 'form-control summer','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-12">
                <label for="resume">File</label>
                @if(isset($val) && $val->url_name)
                    <a href="{{ asset($val->url_name) }}" target="_blank"> 
                        <img src="{{ asset($val->url_name) }}" style="width:25px;">
                    </a>
                @endif
                <input type="file" class="form-control" name="url_name" >
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Status', ['class' => 'form-control-label']) }}
                    {{ Form::select('status', ['1'=>'Active','0'=>'In-active'], null, [ 'class'=> 'form-control','required'=>true]) }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>