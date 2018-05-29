<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: administrador
 * Date: 28/05/18
 * Time: 02:35
 */

namespace Excel\Repositorio;

use Excel\Model\PlanilhaModel;

class PlanilhaRepositorio
{
    protected $model;

    public function __construct(PlanilhaModel $model)
    {
        $this->model = $model;
    }

    public function all($input = null)
    {
        return $this->model->all();
    }

    public function save(array $input)
    {
        return $this->model->create($input);
    }
}