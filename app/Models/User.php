<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function fullname()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * Verifie si l'utilisateur est un admin
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->roles()->where('name', 'admin')->exists();
    }
    /**
     * Verifie si l'utilisateur est un editeur
     *
     * @return boolean
     */
    public function isEditor()
    {
        return $this->roles()->where('name', 'editor')->exists();
    }

    /**
     * Verifie si l'utilisateur est un super admin
     *
     * @return boolean
     */
    public function isSuperAdmin()
    {
        return $this->roles()->where('name', 'super_admin')->exists();
    }

    /**
     * Verifie si l'utilisateur a les droit de modification
     *
     * @return boolean
     */
    public function canUpload()
    {
        return $this->isEditor() || $this->isAdmin() || $this->isSuperAdmin();
    }

    /**
     * Verifie si l'utilisateur a les droit des vip comme les admin ou superAdmin
     *
     * @return boolean
     */
    public function canDoVIPActions()
    {
        return $this->isAdmin() || $this->isSuperAdmin();
    }

    /**
     * Recupere le role Admin
     *
     * @return Role
     */
    public function getAdminRole()
    {
        return $this->roles()->where('name', 'admin')->first();
    }
    /**
     * Recupere le role SuperAdmin
     *
     * @return Role
     */
    public function getSuperAdminRole()
    {
        return $this->roles()->where('name', 'super_admin')->first();
    }
}
