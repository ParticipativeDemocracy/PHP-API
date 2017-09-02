<?php

namespace App\Models;

/**
 * Class Document
 * @package App\Models
 * @property string $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \App\Models\User $locations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DocumentIteration $documentIterations
 */
class Document extends BaseModel
{
    /**
     * @var string table name
     */
    protected $table = 'documents';

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
     * Belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users() {
        return $this->belongsTo(User::class);
    }

    /**
     * Has many document iterations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentIterations() {
        return $this->hasMany(DocumentIteration::class);
    }

    /**
     * Retrieve the latest document iteration for a document
     *
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function latestIteration() {
        return $this->hasOne(DocumentIteration::class)->latest();
    }
}
