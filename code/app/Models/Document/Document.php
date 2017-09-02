<?php
namespace Government\Models\Document;

use Government\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Document
 * @package Government\Models\Document
 * @property $title string the name of this document
 * @property $created_by_id int the user that created this document
 * @property $createdBy User the user model that created this document
 * @property $iterations Collection the iterations that this document has gone under
 */
class Document extends Model
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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'created_by_id'
    ];

    /**
     * The relation to the user that created this document
     *
     * @return BelongsTo
     */
    public function createdBy(): BelongsTo {
        return $this->belongsTo(User::class, 'id', 'created_by_id');
    }

    /**
     * All current document iterations that have been made
     *
     * @return HasMany
     */
    public function iterations(): HasMany {
        return $this->hasMany(Iteration::class);
    }

    /**
     * Returns the current document iteration
     *
     * @return Iteration
     */
    public function currentIteration(): ?DocumentIteration {
        return $this->iterations()->latest();
    }

}