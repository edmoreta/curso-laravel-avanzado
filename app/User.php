<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Faker;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function peliculas()
    {        
        return $this->hasMany('\App\Pelicula', 'idUser'); // modelo y clave foránea
    }

    //public function roles_usuario()
    //{
    //    return $this->belongsToMany('\App\Role', 'role_user');
    //}

    public static function boot()
    {
        parent::boot();

        static::creating(function ($usuario) {
            $faker = Faker\Factory::create();
            $password = $faker->password();
            info($password);
            $usuario->password=bcrypt($password);
        });
    }

}
