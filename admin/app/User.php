<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    function roles(){
        return $this->belongsToMany(Role::class , 'role_users', 'user_id','role_id' );
    }

    // function role(){
    //     return $this->belongsTo('App\Role');


    // }


    // function roles(){
    //     return $this->belongsTo(Role::class );

    // }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function checkPermissionAccess($permissionCheck){
        // return true;
        //B1 lấy được các quyền user đang login trong hệ thống
        // B2 so sánh giá trị đưa vào của route hiện tai xem co ton tai trong cac quyen minh lay hay k

        $roles = auth()->user()->roles;
        // dd($roles);

        foreach($roles as $role){
            $list_roles = $role->list_roles;
            if($list_roles->contains('key_code' , $permissionCheck)){
                return true;
            }   
        }
        return false;
        // dd($list_roles);
        // abort('403');
        // return abort(403);
    }
}
