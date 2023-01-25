<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'date'
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class,'role_permission');
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function hasPermission($permission){
        $perms = $this->permissions->toArray();
        $hasPerm = false;
        foreach($perms as $perm){
            $perm = json_decode(json_encode($perm));
            if($perm->name===$permission){
                $hasPerm = true;
                break;
            }
          }
        
        return $hasPerm;
    }
}
