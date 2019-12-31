<?php
namespace App\Repositories;

use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;

class BaseRepositories implements BaseContract
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model=$model;
    }


    /**
     * create a model instanse
     * @param array $attributes
     * @return  $mixed
     */

    public function create(array $attributes){
        return $this->model->create($attributes);
    }

    /**
     * update a model instance
     * @param array $attributes
     * @param int $id
     * @return $mixed
     */

    public function update(array $attributes,int $id) : bool
    {
        return $this->find($id)->update($attributes);
    }


    /**
     * return all model rows
     * @param array $colums
     * @param string $orderBy
     * @param string $sortBy
     * @return $mixed
     */

    public function all($columns=array('*'),string $orderBy='id',string $sortBy='asc'){
        return $this->model->orderBy($orderBy,$sortBy)->get($columns);
    }

    /**
     * find one by id
     * @param int $id
     * @return $mixed
     */

    public function find(int $id){
        return $this->model->find($id);
    }

    /**
     * find by id or throw exception
     * @param int $id
     * @return $mixed
     */

    public function findOneOrFail(int $id){
        return $this->model->findOrFail($id);
    }

    /**
     * find based on diffrent column
     * @param array $data
     * @return $mixed
     */
    public function findBy(array $data){
        return $this->model->where($data)->all();
    }

    /**
     * find one based on diffrent column
     * @param array $data
     * @return $mixed
     */
    public function findOneBy(array $data){
        return $this->model->where($data)->first();
    }
    /**
     * find one based on diffrent colums or throgh exception
     * @param array $date
     * @retun $mixed
     */
    public function findOneByOrFail(array $data){
        return $this->model->where($data)->firstOrFail();
    }

    /**
     * delete one by id
     * @param int $id
     * @return $mixed
     */
    public function delete(int $id) : bool
    {
        return $this->model->find($id)->delete();
    }



}
