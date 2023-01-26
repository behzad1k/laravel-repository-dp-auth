<?php


namespace App\Contracts;


interface BaseContract
{

    public function findById($socialId);

    public function getAll($paginate = null);

    public function store($data);

    public function update($id,$data);

    public function delete($id);

}
