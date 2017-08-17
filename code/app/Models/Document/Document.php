<?php
namespace Government\Models\Document;

use Government\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * Class Document
 * @package Government\Models\Document
 * @property $title string the name of this document
 * @property $created_by_id int the user that created this document
 * @property $createdBy User the user model that created this document
 */
class Document extends Model
{

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

}