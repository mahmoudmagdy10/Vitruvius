<?php

namespace Vitruvius\Project\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vitruvius\Project\Models\Props;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        'arch',
        'file2D_path',
        'file3D_path',
        'user_id',
        'accepted',
        'belog_to_contractor',
        'paied_salary',
        'payment_status',
        'tax_record',
    ];

    public function  scopeSelection($query)
    {

        return $query->select('id', 'arch', 'file_path', 'user_id','accepted','belog_to_contractor','paied_salary','payment_status','tax_record');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function comments(){
    //     return $this->hasMany(Comment::class, 'project_id');
    // }

    public function props(){
        return $this->hasMany(Prop::class, 'project_id');
    }
}
