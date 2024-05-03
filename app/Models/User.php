<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;


class User extends Authenticatable
{
    use HasFactory, Notifiable;


    const ROLE_ADMIN= 'ADMIN';
    const ROLE_EMPLOYEE= 'EMPLOYEE';
    const ROLE_USER= 'USER';

    const ROLES=[
        self::ROLE_ADMIN=>'Admin',
        self::ROLE_EMPLOYEE=>'Employee',
        self::ROLE_USER=>'USER',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin();
    }

public function isAdmin(){
    return $this->role === self::ROLE_USER;
}
public function isEmployee(){
    return $this->role === self::ROLE_EMPLOYEE;
}




    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
