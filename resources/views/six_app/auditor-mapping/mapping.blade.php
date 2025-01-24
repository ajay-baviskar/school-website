<h2>
    <center>Mapping Data for {{date('F Y',strtotime($month))}}</center>
</h2>
<table class="table table-bordered dt-responsive  nowrap w-100 " id="datatable" >
    <thead class="thead-light">
    <tr>
        <th scope="col">Champion User</th>
        <th scope="col">Week 1 Auditor</th>
        <th scope="col">Week 2 Auditor</th>
        <th scope="col">Week 3 Auditor</th>
        <th scope="col">Week 4 Auditor</th>
        <th scope="col">Week 5 Auditor</th>
        <th scope="col" class="text-center">Action</th>
    </tr>
    </thead>
    <tbody class="list">
        <?php 
            $list = [
                'w1_auditor_id',
                'w2_auditor_id',
                'w3_auditor_id',
                'w4_auditor_id',
                'w5_auditor_id',
            ];
         ?>
    @foreach($user_data as $val)
    <?php 
        $getAuditor = $val->getAuditor($month);
        if ($getAuditor) {
            $getAuditor = $getAuditor->toArray();
        }
    // echo "<pre>"; print_r($getAuditor); echo "</pre>"; die('anil');
     ?>
    <input type="hidden" name="user[{{ $val->id }}][user_id]" value="{{ $val->id }}" tag="user_id">
    <input type="hidden" name="user[{{ $val->id }}][location_id]" value="{{ $val->location_id }}" tag="location_id">
    <input type="hidden" name="user[{{ $val->id }}][department_id]" value="{{ $val->department_id }}" tag="department_id">
    <input type="hidden" name="user[{{ $val->id }}][month]" value="{{ $month }}" tag="month">
        <tr data-id="{{ $val->id }}">
            <td data-field="name">{{ $val->name }}</td>
            @foreach($list as $lists)
            <td data-field="name">
                <div class="form-group">
                    <select class="form-group" name="user[{{ $val->id }}][{{$lists}}]" tag="{{$lists}}">
                        <option value="">Select Auditor</option>
                        @foreach($auditor_data as $vals)
                        <option value="{{ $vals->id }}" @if($getAuditor && $getAuditor[$lists] == $vals->id) selected @endif >{{$vals->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
            </td>
            @endforeach
            <!-- 
            <td data-field="url_name">
                @if($val->status == 1)
                <span class="badge badge-pill badge-soft-success font-size-11">Active</span>
                @else
                <span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>
                @endif
            </td> -->
            <td>
                <button class="btn btn-info btn-sm m-1 save-btn"  champion_user_id="{{$val->id}}">
                    <i class="fa fa-save" aria-hidden="true"></i>
                </button>
                
            </td>
        </tr>
    @endforeach
    </tbody>
</table>