<?php
/**
 * Created by IntelliJ IDEA.
 * User: Quixotical
 * Date: 8/20/17
 * Time: 16:24
 */
declare(strict_types=1);
namespace App\Contracts\Repositories;

use App\Models\Document;

interface DocumentIterationRepositoryContract
{
    /**
     * Create new document Iteration
     * @param array $data
     * @param Document $document
     * @return
     */
    public function create(array $data = [], Document $document);
}