    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Head Text', ['class' => 'form-control-label']) }}
                    {{ Form::text('head_text', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Footer Text', ['class' => 'form-control-label']) }}
                    {{ Form::text('footer_text', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>