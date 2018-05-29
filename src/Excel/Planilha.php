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
use Maatwebsite\Excel\Excel;

class Planilha
{
    protected $repository;

    public function __construct(PlanilhaRepositorio $repository)
    {
        $this->repository = $repository;
    }

    public function export()
    {
        $dados = $this->repository->all();

        return \Excel::create('Planilha-ex', function ($excel) use ($dados){

            $excel->sheet('Planilha 01', function ($sheet) use ($dados){
                $sheet->setOrientation('portrait');

                $sheet->fromArray($dados);
            });

        })->download('xls');
    }

    public function import()
    {
        \Excel::load('/public/excel/planilha.XLSX', function ($reader) {
            // Getting all results
            $results = $reader->get();

            dd($results);
//            foreach ($results as $result) {
//                dd($result);
//            }

        });
    }

}