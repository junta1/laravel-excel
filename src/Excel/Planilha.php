<?php
declare(strict_types=1);

namespace Excel;

/**
 * Created by PhpStorm.
 * User: administrador
 * Date: 28/05/18
 * Time: 01:58
 */

use Excel\Repositorio\PlanilhaRepositorio;
use Rap2hpoutre\FastExcel\FastExcel;

class Planilha
{
    protected $execel;

    protected $repository;

    public function __construct(PlanilhaRepositorio $repository)
    {
        $this->repository = $repository;
    }

//    public function collection()
//    {
//        return $this->invoices->all();
//    }

    public function exportFast()
    {
        $this->execel = new FastExcel($this->repository->all());

//        dd($this->execel);

        return $this->execel->download('file.xlsx');
    }
}