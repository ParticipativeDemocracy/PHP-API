<?php
/**
 * Created by PhpStorm.
 * User: brycemeyer
 * Date: 8/18/17
 * Time: 7:09 PM
 */

namespace Government\Http\Controllers\Document;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateDocumentIterationRequest
 * @package Government\Http\Controllers\Document
 */
class CreateDocumentIterationRequest extends FormRequest
{

    /**
     * @return array
     */
    public function rules() {
        return [
            'content' => 'required|string'
        ];
    }
}