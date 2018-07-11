<?php

namespace App;
use App\Textpost;
use App\Comment;
use App\Video;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname','username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    

    //Defining relationships with other models
    
    public function textposts()
    {
        return $this->hasMany('App\Textpost');
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }



    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }
    
    public function authorizeRoles($roles)
    {
        if($this->hasAnyRole($roles)){
            return true;
        }
        return redirect()->Back();
        
        
    }
    
    public function hasAnyRole($roles)
    {
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
            
        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if($this->roles()->where('name',$role)->first()){
            return true;
        }
        
        return false;
    }
}
