<?php

namespace Government\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 * @package Government\Models
 * @property $name The name of this role
 * @property $users Collection All users that have this role
 */
class Role extends Model
{
    use SoftDeletes;

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
     * @var array Variables not shown
     */
    protected $hidden = [
        'deleted_at'
    ];

    /**
     * Role assigned to all members of the company
     */
    const ROLE_COMPANY_MEMBER = 'company_member';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class);
    }
}