<?php

namespace App\Repositories\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\StudentInterface;

class StudentRepository extends EloquentRepository implements StudentInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base respository constructor
     * 
     * @param Model $model
     */
    public function __construct(Student $model)
    {
        $this->model = $model;
    }
}