<?php

namespace App\Services;

use App\Contracts\Models;
use App\Traits\ChartConvert;

class Service
{
    use ChartConvert;

    /**
     * @var bookInterface
     */
    protected $bookInterface;

    /**
     * @var userInterface
     */
    protected $userInterface;

    /**
     * @var studentInterface
     */
    protected $studentInterface;

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
        Models\AuditInterface $auditInterface,
        Models\AuthorInterface $authorInterface,
        Models\StudentInterface $studentInterface,
        Models\PublisherInterface $publisherInterface,
        Models\BookCategoryInterface $bookCategoryInterface
    )
    {
        $this->bookInterface = $bookInterface;
        $this->userInterface = $userInterface;
        $this->auditInterface = $auditInterface;
        $this->authorInterface = $authorInterface;
        $this->studentInterface = $studentInterface;
        $this->publisherInterface = $publisherInterface;
        $this->bookCategoryInterface = $bookCategoryInterface;
    }
}
