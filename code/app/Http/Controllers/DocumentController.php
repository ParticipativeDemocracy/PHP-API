<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\DocumentRepositoryContract;
use App\Http\Requests\Document\StoreRequest;
use Illuminate\Http\Request;

/**
 * Class DocumentController
 * @package App\Http\Controllers
 */
class DocumentController extends Controller
{
    /**
     * @var DocumentRepositoryContract $documentRepository
     */
    protected $documentRepository;

    /**
     * DocumentController constructor
     * @param DocumentRepositoryContract $documentRepository
     */
    public function __construct(DocumentRepositoryContract $documentRepository) {
        $this->documentRepository = $documentRepository;
    }

    /**
     * Display a listing of the resources
     * @param Request $request
     */
    public function index(Request $request) {
        return $this->documentRepository->findAll();
    }

    /**
     * Create a new document
     * @param StoreRequest|Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(StoreRequest $request) {
        $model = $this->documentRepository->create($request->json()->all());
        return response($model, 201);
    }
}
