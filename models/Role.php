<?php

namespace Models;

use Carbon\Carbon;

class Role extends Model {
    protected $table = 't_roles';
    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rolename',
        'slug',
        'description',
        'level'
    ];

    //protected $with = 'menus';

    //
    public function users(){
        //return $this->belongsToMany('App\Models\User');
        return $this->hasMany(User::class);
    }

    public function menus(){
        return $this
            ->belongsToMany('Models\Menu', 't_menu_role', 'role_id', 'menu_id');
            //->belongsToMany('App\Models\Menu', 't_menu_role', 'role_id', 'menu_id');
            //->belongsToMany('App\Models\Menu', 't_menu_role', 'menu_id', 'role_id');
    }

    
    public function setCreatedAtAttribute( $value ) {
        if (_env('DB_CONNECTION') == 'mysql') {
            $this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }elseif(_env('DB_CONNECTION') == 'sqlsrv'){
            $this->attributes['created_at'] = (new Carbon($value))->format('Ymd H:i:s');
        }else{
            $this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }
    }

    public function setUpdatedAtAttribute( $value ) {
        if (_env('DB_CONNECTION') == 'mysql') {
            $this->attributes['updated_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }elseif(_env('DB_CONNECTION') == 'sqlsrv'){
            $this->attributes['updated_at'] = (new Carbon($value))->format('Ymd H:i:s');
        }else{
            $this->attributes['updated_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }
    }

    public function getMenus(){
        return $this->menus;
    }
    
}