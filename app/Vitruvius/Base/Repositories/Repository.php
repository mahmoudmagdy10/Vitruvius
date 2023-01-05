<?php

namespace Vitruvius\Base\Repositories;

use Vitruvius\Base\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
class Repository implements RepositoryInterface {
    protected $model;

    public function __construct(Model $model)
    {
        $this->setModel($model);

    }
	/**
	 * @return mixed
	 */
	public function all() {

        return $this->model->all();
	}

	/**
	 *
	 * @param mixed $model
	 * @return Model|null
	 */
	public function find($id): ?Model
    {
        return $this->model->find($id);
	}

	/**
	 *
	 * @param array $data
	 * @return Model|null
	 */
	public function create(array $data): ?Model
    {
        foreach($data as $field => $val){
            $this->model->{$field} = $val;
        }
        $this->model->save();
        return $this->model;

	}

    /**
	 *
	 * @param array $data
	 * @return Model|null
	 */
	public function update(array $data , $model): ?Model
    {
        $model = $this->model->find($data['id']);
        if(!$model)
            return null;

        foreach($data as $field => $val){
            $this->model->{$field} = $val;
        }
        $this->model->save();
        return $this->model;

	}

	/**
	 *
	 * @param mixed $model
	 * @return Model|null
	 */
	public function delete($model): ?Model
    {
        $model = $this->model->find($model);
        if(!$model)
            return null;

        return $model->delete();

	}

    /**
	 * @param Model $model
	 * @return self
	 */
	public function setModel(Model $model): self {
		$this->model = $model;
		return $this;
	}

	/**
	 * @return Model
	 */
	public function getModel(): Model {
		return $this->model;
	}

}
