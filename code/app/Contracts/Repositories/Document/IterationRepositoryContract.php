<?php
/**
 * Created by IntelliJ IDEA.
 * User: Quixotical
 * Date: 8/20/17
 * Time: 16:24
 */
declare(strict_types=1);

namespace Government\Contracts\Repositories\Document;

use Government\Models\Document\Document;

interface IterationRepositoryContract
{
    /**
     * Create new document Iteration
     * @param array $data
     * @param Document $document
     * @return
     */
    public function create(array $data = [], Document $document);
}