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
        $this->model = new PlanilhaModel();

        $this->model->plan_codigo_tarefa = $input['plan_codigo_tarefa'];
        $this->model->plan_nome = $input['plan_nome'];
        $this->model->plan_codigo_unidade = $input['plan_codigo_unidade'];
        $this->model->plan_quantidade = $input['plan_quantidade'];
        $this->model->plan_valor_unitario = $input['plan_valor_unitario'];
        $this->model->plan_valor_parcial = $input['plan_valor_parcial'];

        return $this->model->save();
    }
}