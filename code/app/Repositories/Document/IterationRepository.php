<?php
/**
 * Created by IntelliJ IDEA.
 * User: Quixotical
 * Date: 8/20/17
 * Time: 16:22
 */
namespace Government\Repositories\Document;

use Government\Contracts\Repositories\Document\IterationRepositoryContract;
use Government\Models\Document\Document;
use Government\Models\Document\Iteration;

/**
 * Class IterationRepository
 * @package App\Repositories
 */
class IterationRepository implements IterationRepositoryContract
{
    /**
     * @var Iteration $DocumentIteration - the document model for this repository instance
     */
    protected $iteration;

    /**
     * @var string ending of foreign key fields
     */
    protected $id = '_id';

    /**
     * Constructor for the DocumentIterationRepository
     * @param Iteration $iteration
     */
    public function __construct(Iteration $iteration){
        $this->iteration = $iteration;
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
        return $this->iteration->create($dataAndFk);
    }

    private function createForeign($tableName){
        return str_singular($tableName) . $this->id;
    }
}