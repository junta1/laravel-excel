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

    public function exportFast()
    {
        $this->execel = new FastExcel($this->repository->all());

        return $this->execel->download('file.xlsx');
    }

//    public function importFast()
//    {
//        $users = (new FastExcel)->import('file.xlsx', function ($line) {
//            return User::create([
//                'name' => $line['Name'],
//                'email' => $line['Email']
//            ]);
//        });
//
//        $fastExcel = new FastExcel();
//
//        $import = $fastExcel->import('file.xlx', function ($line){
//            return $this->repository->save([
//                'plan_codigo_tarefa' => $line['CodigoTarefa']
//            ]);
//        });
////
//        return $import;
//    }
}