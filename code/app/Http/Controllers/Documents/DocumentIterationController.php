<?php
/**
 * Created by PhpStorm.
 * User: brycemeyer
 * Date: 8/19/17
 * Time: 3:58 PM
 */

namespace Government\Http\Controllers\Documents;

use Government\Http\Controllers\Controller;
use Government\Http\Controllers\Document\CreateDocumentIterationRequest;
use Government\Models\Document\Document;
use Government\Models\Document\Iteration;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class DocumentIterationController extends Controller
{
    /**
     * @var Document
     */
    public $document;

    /**
     * @var Iteration
     */
    public $iteration;

    /**
     * DocumentIterationController constructor.
     */
    public function __construct()
    {
        $this->document = new Document();
        $this->iteration = new Iteration();
    }

    /**
     * Creates a new document iteration
     *
     * @param CreateDocumentIterationRequest $request
     * @return JsonResponse
     */
    public function create(CreateDocumentIterationRequest $request) : JsonResponse
    {

        $document = $this->document->find($request->document_id);

        if (!$document) {
            return new JsonResponse([
                'message' => 'Document not found'
            ], 404);
        }

        $iteration = $this->iteration->create([
            'content' => $request->input('content'),
            'document_id' => $document->id,
            'created_by_id' => auth()->user()->id,
        ]);

        return new JsonResponse([
            'message' => 'Document iteration created!',
            'document_iteration' => $iteration
        ]);
    }

}