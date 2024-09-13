<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * This is the model class for table "comment".
 *
 * @property int $id

 * @property string|null $name
 * @property string|null $email
 * @property string $role
 * @property string $password
 * @property int $status

 *
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const  ENABLED_STATUS = 1;
    public const  DISABLED_STATUS = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    public function getStatusName(): string
    {
        if ($this->status == self::ENABLED_STATUS) {
            return 'Enabled';
        }
        return 'Disabled';
    }
}
