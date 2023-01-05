<?php

namespace Vitruvius\Base\Repositories;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface {
    public function all();
    public function find($model): ? Model;
    public function create(array $data): ? Model;
    public function update(array $data,$model): ? Model;
    public function delete($model): ? Model;
}
