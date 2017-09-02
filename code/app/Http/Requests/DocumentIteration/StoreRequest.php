<?php

namespace App\Http\Requests\DocumentIteration;

use App\Models\Document;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreRequest
 * @package App\Http\Requests\DocumentIteration
 * @property string $user_id
 * @property integer $document_id
 */
class StoreRequest extends FormRequest
{
    /**
     * @var Document $document
     */
    public $document;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->document = Document::find($this->document_id);
        return $this->document instanceof Document;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|string'
        ];
    }
}
