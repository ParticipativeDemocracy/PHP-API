<?php
/**
 * Created by IntelliJ IDEA.
 * User: Quixotical
 * Date: 8/20/17
 * Time: 16:22
 */
namespace App\Repositories;

use App\Contracts\Repositories\DocumentRepositoryContract;
use App\Models\Document;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BillRepository
 * @package App\Repositories
 */
class DocumentRepository implements DocumentRepositoryContract
{
    /**
     * @var Document $bill the bill model for this instance
     */
    protected $document;

    public function __construct(Document $document){
        $this->document = $document;
    }

    /**
     * Find all documents
     */
    public function findAll(): Collection
    {
        return $this->document->with(['latestIteration'])->get();
    }

    /**
     * Create a new document
     * @param array $data
     * @return bool
     */
    public function create(array $data = [])
    {
        return $this->document->create($data);
    }
}