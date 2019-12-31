<?php
namespace App\Contracts;


interface BaseContract{


    /**
     * create a model instanse
     * @param array $attributes
     * @return  $mixed
     */

    public function create(array $attributes);

    /**
     * update a model instance
     * @param array $attributes
     * @param int $id
     * @return $mixed
     */

    public function update(array $attributes,int $id);


    /**
     * return all model rows
     * @param array $colums
     * @param string $orderBy
     * @param string $sortBy
     * @return $mixed
     */

    public function all($columns=array('*'),string $orderBy='id',string $sortBy='desc');

    /**
     * find one by id
     * @param int $id
     * @return $mixed
     */

    public function find(int $id);

    /**
     * find by id or throw exception
     * @param int $id
     * @return $mixed
     */

    public function findOneOrFail(int $id);

    /**
     * find based on diffrent column
     * @param array $data
     * @return $mixed
     */
    public function findBy(array $data);

    /**
     * find one based on diffrent column
     * @param array $data
     * @return $mixed
     */
    public function findOneBy(array $data);
    /**
     * find one based on diffrent colums or throgh exception
     * @param array $date
     * @retun $mixed
     */
    public function findOneByOrFail(array $data);

    /**
     * delete one by id
     * @param int $id
     * @return $mixed
     */
    public function delete(int $id);
}

