    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('text', 'Name', ['class' => 'form-control-label']) }}
                    {{ Form::text('desc', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('type_id', 'Category', ['class' => 'form-control-label']) }}
                    {{ Form::select('cat_id', $category, null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('plant_id', 'Type', ['class' => 'form-control-label']) }}
                    {{ Form::select('type_id', $type, null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('plant_id', 'Field Type', ['class' => 'form-control-label']) }}
                    {{ Form::select('field_type_id', $field_type_data, null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('text', 'Status', ['class' => 'form-control-label']) }}
                    {{ Form::select('status', ['1'=>'Active','0'=>'In-active'], null, [ 'class'=> 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-md-12 " id="formRepeater">
            <div class="row">
                @if(isset($val))
                <?php 
                $option = json_decode($val->options,true);
                ?>
                @if($option)
                    @foreach($option as $k => $option_data)
                        @if($k == 0)
                            <div class="col-md-8 form-group">
                                <div data-repeater-list="group-a"  >
                                    <div data-repeater-item class="row">
                                        <div  class="mb-12 col-lg-12">
                                            <label for="name">Option</label>
                                            <input type="text"  name="option[]" value="{{ $option_data }}" class="form-control" placeholder="Enter Options"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 form-group " style="margin-top: 25px;">
                                <input data-repeater-create type="button" class="btn btn-success mt-10 mt-lg-0" id="addField" value="Add"/>
                            </div>
                        @else
                            <div data-repeater-item class="row">
                                <div  class="col-md-8">
                                    <label for="name">Option</label>
                                    <input type="text"  name="option[]" value="{{ $option_data }}" class="form-control" placeholder="Enter Options"/>
                                </div>
                                <div class="col-md-4" style="margin-top: 25px;">
                                    <div class="">
                                        <input data-repeater-delete type="button" class="btn btn-primary remove-field" value="Delete"/>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                <div class="col-md-8 form-group">
                    <div data-repeater-list="group-a"  >
                        <div data-repeater-item class="row">
                            <div  class="mb-12 col-lg-12">
                                <label for="name">Option</label>
                                <input type="text"  name="option[]" class="form-control" placeholder="Enter Options"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 form-group " style="margin-top: 25px;">
                    <input data-repeater-create type="button" class="btn btn-success mt-10 mt-lg-0" id="addField" value="Add"/>
                </div>
                @endif
                @else
                <div class="col-md-8 form-group">
                    <div data-repeater-list="group-a"  id="formRepeater">
                        <div data-repeater-item class="row">
                            <div  class="mb-12 col-lg-12">
                                <label for="name">Option</label>
                                <input type="text"  name="option[]" class="form-control" placeholder="Enter Options"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 form-group " style="margin-top: 25px;">
                    <input data-repeater-create type="button" class="btn btn-success mt-10 mt-lg-0" id="addField" value="Add"/>
                </div>
                @endif
            </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <!-- <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    