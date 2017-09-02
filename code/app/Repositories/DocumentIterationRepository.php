<?php
/**
 * Created by IntelliJ IDEA.
 * User: Quixotical
 * Date: 8/20/17
 * Time: 16:22
 */
namespace App\Repositories;

use App\Contracts\Repositories\DocumentIterationRepositoryContract;
use App\Models\Document;
use App\Models\DocumentIteration;
use App\Models\EloquentAbstractModel;

/**
 * Class DocumentIterationRepository
 * @package App\Repositories
 */
class DocumentIterationRepository implements DocumentIterationRepositoryContract
{
    /**
     * @var DocumentIteration $DocumentIteration - the document model for this repository instance
     */
    protected $documentIteration;

    /**
     * @var string ending of foreign key fields
     */
    protected $id = '_id';

    /**
     * Constructor for the DocumentIterationRepository
     * @param DocumentIteration $DocumentIteration
     */
    public function __construct(DocumentIteration $DocumentIteration){
        $this->documentIteration = $DocumentIteration;
    }

    /**
     * Create new document Iteration
     * @param array $data
     * @param Document $document
     * @return $this|\Illuminate\Database\Eloquent\Model
     * @internal param EloquentAbstractModel $parent
     */
    public function create(array $data = [], Document $document)
    {
        $tableName = $document->getTable();
        $foreignKey = $this->createForeign($tableName);
        $dataAndFk = array_add($data, $foreignKey, $document->id);
        return $this->documentIteration->create($dataAndFk);
    }

    private function createForeign($tableName){
        return str_singular($tableName) . $this->id;
    }
}