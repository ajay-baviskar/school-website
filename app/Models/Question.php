<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['desc','cat_id','type_id','status','field_type_id','options'];

    public function getCat()
    {
        return $this->hasOne(QuestionCategory::class,'id','cat_id');
    }

    public function getFieldType()
    {
        return $this->hasOne(FieldType::class,'id','field_type_id');
    }

    public function getType()
    {
        return $this->hasOne(Type::class,'id','type_id');
    }

    public function getDepartment()
    {
        $department = Department::select('name')->whereIn('id',json_decode($this->department_id,true))->get()->pluck('name')->toArray();
        return implode(',', $department);
    }
}
