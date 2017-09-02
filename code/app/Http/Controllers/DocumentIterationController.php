<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\DocumentIterationRepositoryContract;
use App\Http\Requests\DocumentIteration\StoreRequest;
use Illuminate\Http\Request;

class DocumentIterationController extends Controller
{
    /**
     * @var DocumentIterationRepositoryContract $documentIterationRepository
     */
    protected $documentIterationRepository;

    /**
     * DocumentIterationController constructor
     * @param DocumentIterationRepositoryContract $documentIterationRepository
     */
    public function __construct(DocumentIterationRepositoryContract $documentIterationRepository) {
        $this->documentIterationRepository = $documentIterationRepository;
    }

    /**
     * Store a new document iteration
     * @param StoreRequest|Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(StoreRequest $request){
        $model = $this->documentIterationRepository->create($request->json()->all(), $request->document);
        return response($model, 201);
    }
}
