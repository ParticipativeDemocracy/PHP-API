<?php
/**
 * Created by PhpStorm.
 * User: brycemeyer
 * Date: 8/19/17
 * Time: 3:45 PM
 */
namespace Government\Http\Controllers\Documents;

use Government\Http\Controllers\Controller;
use Government\Http\Controllers\Document\CreateDocumentRequest;
use Government\Models\Document\Document;
use Government\Models\Document\DocumentIteration;
use Illuminate\Http\JsonResponse;

class DocumentController extends Controller
{

    /**
     * @var Document
     */
    private $document;

    /**
     * DocumentController constructor.
     */
    public function __construct()
    {
        $this->document = new Document();
    }

    /**
     * Loads all documents in the system
     *
     * @return JsonResponse
     */
    public function all() : JsonResponse {

        $documents = Document::all();

        $data = [];

        foreach ($documents as $document) {
            $row = clone $document;
            $row->content = $document->currentIteration()->content;

            $data[] = $row;
        }

        return new JsonResponse([
            'message' => 'Successfully loaded all documents.',
            'documents' => $data
        ]);
    }

    /**
     * Creates a single document object and returns it
     *
     * @param CreateDocumentRequest $request
     * @return JsonResponse
     */
    public function create(CreateDocumentRequest $request) : JsonResponse {

        $document = $this->document->create([
            'title' => $request->input('title'),
            'created_by_id' => auth()->user()->id,
        ]);

        $documentIteration = new DocumentIteration([
            'document_id' => $document->id,
            'created_by_id' => auth()->user()->id,
            'content' => $request->input('content'),
        ]);

        $document->content = $documentIteration->content;

        return new JsonResponse([
            'message' => 'Successfully created document.',
            'document' => $document
        ]);
    }

}