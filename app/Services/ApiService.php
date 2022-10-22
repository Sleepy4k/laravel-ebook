<?php

namespace App\Services;

use App\Contracts\Models;
use App\Traits\ApiRespons;

class ApiService
{
    use ApiRespons;
    
    /**
     * @var bookInterface
     */
    protected $bookInterface;

    /**
     * @var userInterface
     */
    protected $userInterface;

    /**
     * @var siswaInterface
     */
    protected $siswaInterface;

    /**
     * @var auditInterface
     */
    protected $auditInterface;

    /**
     * @var authorInterface
     */
    protected $authorInterface;

    /**
     * @var publisherInterface
     */
    protected $publisherInterface;

    /**
     * @var bookCategoryInterface
     */
    protected $bookCategoryInterface;

    /**
     * Account service constructor.
     * 
     * @param App\Contracts\Models\AuditInterface $auditInterface
     */
    public function __construct(
        Models\BookInterface $bookInterface,
        Models\UserInterface $userInterface,
        Models\SiswaInterface $siswaInterface,
        Models\AuditInterface $auditInterface,
        Models\AuthorInterface $authorInterface,
        Models\PublisherInterface $publisherInterface,
        Models\BookCategoryInterface $bookCategoryInterface
    )
    {
        $this->bookInterface = $bookInterface;
        $this->userInterface = $userInterface;
        $this->siswaInterface = $siswaInterface;
        $this->auditInterface = $auditInterface;
        $this->authorInterface = $authorInterface;
        $this->publisherInterface = $publisherInterface;
        $this->bookCategoryInterface = $bookCategoryInterface;
    }
}
