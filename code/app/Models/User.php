<?php

namespace Government\Models;

use Government\Models\Document\Document;
use Government\Models\Document\DocumentIteration;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package Government\Models
 * @property $name string this users full name
 * @property $email string this users email address
 * @property $password string This users password
 * @property $roles Collection all roles this user is connected to
 * @property $documents Collection all documents this user has created
 * @property $documentIterations Collection all documents this user has created
 */
class User extends Authenticatable
{
    use Notifiable, SoftDeletes;


    /**
     * The variables which are not available to be mass assigned
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @var array Date variables
     */
    protected $dates = [
        'deleted_at'
    ];

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
        'password',
        'remember_token',
        'deleted_at',
    ];

    /**
     * @param $password
     */
    public function setPasswordAttribute($password) {
        $this->attributes['password'] = password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany {
        return $this->belongsToMany(Role::class);
    }

    /**
     * All documents this user has created
     *
     * @return HasMany
     */
    public function documents(): HasMany {
        return $this->hasMany(Document::class, 'created_by_id');
    }

    /**
     * All documents this user has created
     *
     * @return HasMany
     */
    public function documentIterations(): HasMany {
        return $this->hasMany(DocumentIteration::class, 'created_by_id');
    }
}
