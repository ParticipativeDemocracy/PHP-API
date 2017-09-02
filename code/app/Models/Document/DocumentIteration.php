<?php
namespace Government\Models\Document;

use Government\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class DocumentIteration
 * @package Government\Models\Document
 * @property $document_id int the id of the document this is for
 * @property $document Document the model this document is for
 * @property $created_by_id int the id of the user that created this document
 * @property $createdBy User the user model that created this document
 * @property $content string the content of this document iteration
 */
class DocumentIteration extends Model
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
        'content', 'document_id', 'created_by_id'
    ];

    /**
     * The relation to the user that created this document iteration
     *
     * @return BelongsTo
     */
    public function createdBy(): BelongsTo {
        return $this->belongsTo(User::class, 'id', 'created_by_id');
    }

    /**
     * The document that this is part of
     *
     * @return BelongsTo
     */
    public function document(): BelongsTo {
        return $this->belongsTo(Document::class);
    }
}