<div class="modal-body">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Enter holiday title" value="{{ $holiday->title ?? '' }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter description (optional)">{{ $holiday->description ?? '' }}</textarea>
    </div>
    <div class="mb-3">
        <label for="holiday_date" class="form-label">Holiday Date</label>
        <input type="date" name="holiday_date" class="form-control" id="holiday_date" value="{{ $holiday->holiday_date ?? '' }}" required>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select name="type" id="type" class="form-control">
            <option value="regular" {{ isset($holiday) && $holiday->type === 'regular' ? 'selected' : '' }}>Regular</option>
            <option value="non_instruction" {{ isset($holiday) && $holiday->type === 'non_instruction' ? 'selected' : '' }}>Non-Instruction</option>
            <option value="sunday_falling" {{ isset($holiday) && $holiday->type === 'sunday_falling' ? 'selected' : '' }}>Sunday Falling</option>
        </select>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</div>
