<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'role',
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
            'is_admin' => 'boolean',
        ];
    }

    /**
     * Check if the user is an admin
     */
    public function isAdmin(): bool
    {
        // Multiple ways to determine admin status
        $adminEmails = [
            'admin@mirvaninc.com',
            'hello@mirvaninc.com',
        ];

        return $this->is_admin || 
               in_array($this->email, $adminEmails) || 
               str_ends_with($this->email, '@mirvaninc.com');
    }

    /**
     * Get the user's role display name
     */
    public function getRoleDisplayAttribute(): string
    {
        if ($this->isAdmin()) {
            return 'Administrator';
        }
        
        return $this->role ?? 'User';
    }
}