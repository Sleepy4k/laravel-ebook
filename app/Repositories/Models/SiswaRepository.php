<?php

namespace App\Repositories\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Models\SiswaInterface;
use App\Repositories\EloquentRepository;

class SiswaRepository extends EloquentRepository implements SiswaInterface
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
    public function __construct(Siswa $model)
    {
        $this->model = $model;
    }
}