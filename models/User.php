<?php

namespace Models;

class User extends Model {
	protected $table = 't_users';

	/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['logged_in_at', 'logged_out_at'];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = 'role';

    public function role(){
        return $this->belongsTo(Role::class);
        //return $this->belongsTo('App\Models\Role');
            //->withTimestamps();
    }

}
