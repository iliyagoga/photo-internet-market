<?php
namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
class Role extends Model{
    protected $fillable=['role,permission'];
    public function user(){
        return $this->belongsToMany(User::class,'roles_users','role_id','user_id','id','id');
    }
}
?>