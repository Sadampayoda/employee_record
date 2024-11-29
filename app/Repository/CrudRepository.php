<?php


namespace App\Repository;

use App\Repository\Interface\CrudInterface;
use Illuminate\Database\Eloquent\Model;

class CrudRepository implements CrudInterface
{
    protected Model $model;
    public function setModel(Model $model)
    {
        $this->model = $model;
    }
    public function all(array $relational = [], int $paginate = 0)
    {
        if($paginate > 0)
        {
            return ($relational)
            ? $this->model->with($relational)->paginate($paginate)
            : $this->model->paginate($paginate);
        }
        return ($relational)
            ? $this->model->with($relational)->get()
            : $this->model->all();

    }

    public function find(int $id, array $relational = [], int $paginate= 0)
    {
        if($paginate > 0)
        {
            return ($relational)
            ? $this->model->find($id)->with($relational)->paginate($paginate)
            : $this->model->find($id)->paginate($paginate);
        }
        return ($relational)
            ? $this->model->find($id)->with($relational)->get()
            : $this->model->find($id);
    }

    public function create(array $data)
    {
        $this->model->create($data);
    }

    public function update(array $data, int $id)
    {
        $this->model->where('id',$id)->update($data);
    }

    public function delete(int $id)
    {
        $this->model->where('id',$id)->delete();
    }
}
