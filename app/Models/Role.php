<?php

namespace App\Models;
use App\Models\Permission;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'guard_name'
        
    ];
    public function permissions()
{
    return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
}
    public function users(){
        return $this->hasMany(User::class);
    }
}
