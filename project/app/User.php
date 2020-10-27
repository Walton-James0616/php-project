<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $guard = 'user';

    protected $fillable = ['name', 'category_id', 'photo', 'description', 'language', 'education', 'city', 'address', 'phone', 'fax', 'web', 'email','f_url','g_url','t_url','l_url','password','title','details','is_featured','status','active','featured','web','special'];

    protected $hidden = [
        'password'
    ];  

    protected $remember_token = false;  


    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
    public static function getCategoryName($id){
        $categoryName = Category::findOrFail($id);
        return $categoryName->cat_name;

    }
}
