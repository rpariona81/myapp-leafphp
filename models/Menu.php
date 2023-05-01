<?php

namespace Models;

class Menu extends Model
{
    
    protected $table = 't_menus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'menu',
        'controller',
        'action',
        'url',
        'order',
        'visible',
        'is_active'
    ];

    protected $casts = [
        'visible' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function roles(){
        return $this
            ->belongsToMany('Models\Role', 't_menu_role', 'role_id', 'menu_id');
    }

}
