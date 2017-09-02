<?php
/**
 * Created by IntelliJ IDEA.
 * User: Quixotical
 * Date: 8/20/17
 * Time: 16:24
 */
declare(strict_types=1);

namespace Government\Contracts\Repositories\Document;

interface DocumentRepositoryContract
{
    /**
     * Find all documents
     */
    public function findAll();

    /**
     * Create a new document
     * @param array $data
     */
    public function create(array $data = []);
}