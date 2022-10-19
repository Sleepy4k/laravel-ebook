<?php

namespace App\Repositories\Models;

use Carbon\Carbon;
use App\Models\Book;
use App\Contracts\Models\BookInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;

class BookRepository extends EloquentRepository implements BookInterface
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
    public function __construct(Book $model)
    {
        $this->model = $model;
    }
    
    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        if (array_key_exists('tanggal_terbit', $payload)) {
            $payload['tanggal_terbit'] = Carbon::parse($payload['tanggal_terbit'])->format('Y-m-d');
        }

        $model = $this->model->create($payload);

        return $model->fresh();
    }
    
    /**
     * Update existing model.
     *
     * @param int $modelId
     * @param array $payload
     * @return Model
     */
    public function update(int $modelId, array $payload): bool
    {
        if (array_key_exists('tanggal_terbit', $payload)) {
            $payload['tanggal_terbit'] = Carbon::parse($payload['tanggal_terbit'])->format('Y-m-d');
        }
        
        $model = $this->findById($modelId);

        return $model->update($payload);
    }
}