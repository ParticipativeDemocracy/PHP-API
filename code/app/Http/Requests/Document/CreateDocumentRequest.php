<?php
/**
 * Created by PhpStorm.
 * User: brycemeyer
 * Date: 8/18/17
 * Time: 7:07 PM
 */

namespace Government\Http\Controllers\Document;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateDocumentRequest
 * @package Government\Http\Controllers\Document
 */
class CreateDocumentRequest extends FormRequest
{

    /**
     * @return array
     */
    public function rules() {

        return [
            'title' => 'required|string',
            'content' => 'required|string'
        ];
    }

    /**
     * As long as there is a user right now then someone can create a document
     */
    public function authorize()
    {
        return $this->user();
    }
}