<?php

namespace App\Repository\Interface;

use Illuminate\Database\Eloquent\Model;

interface CrudInterface{

    public function setModel(Model $model);
    public function all(array $relational = [],int $paginate = 0);
    public function find(int $id,array $relational = [],int $paginate = 0);
    public function create(array $data);
    public function update(array $data,int $id);
    public function delete(int $id);
}
