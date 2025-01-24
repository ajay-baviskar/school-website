    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <label for="resume">Photo</label>
                @if(isset($val) && $val->name)
                    <a href="{{ asset($val->name) }}" target="_blank"> 
                        <img src="{{ asset($val->name) }}" style="width:25px;">
                    </a>
                @endif
                <input type="file" class="form-control" accept="image/*" name="photo" >
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Year', ['class' => 'form-control-label']) }}
                    <!-- <div class="position-relative" id="datepicker5">
                        <input type="text" class="form-control datepicker5" data-provide="datepicker" data-date-container='#datepicker5'
                            data-date-format="dd M, yyyy" data-date-min-view-mode="2">
                    </div> -->
                    {{ Form::number('year', null, ['class' => 'form-control','required'=>true]) }}
                </div>
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