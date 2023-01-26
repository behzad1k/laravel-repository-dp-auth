<?php


namespace App\Repositories;
use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseContract
{
    protected $model;
    public function __construct(Model $model){
        $this->model = $model;
    }
    public function findById($id){
        return $this->model->findOrFail($id);
    }
    public function getAll($paginate = null){
        if (!is_null($paginate))
            return $this->model->paginate($paginate);
        return $this->model->all();
    }
    public function store($data){
        return $this->model->create($data);
    }
    public function update($object,$data){
        return $object->update($data);
    }
    public function delete($object){
        $object->delete();
    }
}
