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

        $dadosTratados = [];

        foreach ($dados as $dado) {
            array_push($dadosTratados, $this->tratarSaida($dado));
        }

        return \Excel::create('Planilha-ex', function ($excel) use ($dadosTratados) {

            $excel->sheet('Planilha 01', function ($sheet) use ($dadosTratados) {
                $sheet->setOrientation('portrait');

                //Máscara de valor
                $sheet->setColumnFormat([
                    'E' => '#,##0.00',
                    'F' => '#,##0.00'
                ]);

                $sheet->fromArray($dadosTratados);

                //Definindo título
                $sheet->row(1,
                    [
                        'Código da Tarefa',
                        'Nome',
                        'Código da Unidade',
                        'Quantidade',
                        'Valor Unitário',
                        'Valor Parcial',
                    ]
                );
            });

        })->download('xls');
    }

    public function import()
    {
        $dadosTratados = [];

        \Excel::load('/public/excel/planilha.XLSX', function ($reader) use (&$dadosTratados){
            // Getting all results
            $results = $reader->get();

            foreach ($results as $result) {

                array_push($dadosTratados, $this->tratarEntrada($result));
            }

        });

        foreach ($dadosTratados as $dados) {
            $this->repository->save($dados);
        }

        return 'Sucesso';
    }

    protected function tratarSaida($tratar)
    {
        return [
            'codTarefa' => (string)$tratar->plan_codigo_tarefa,
            'nome' => $tratar->plan_nome,
            'codUnidade' => $tratar->plan_codigo_unidade,
            'quantidade' => $tratar->plan_quantidade,
            'valorUnitario' => $tratar->plan_valor_unitario,
            'valorParcial' => $tratar->plan_valor_parcial,
        ];
    }

    protected function tratarEntrada($tratar)
    {
        return [
            'plan_codigo_tarefa' => (string)$tratar['codigo_da_tarefa'],
            'plan_nome' => $tratar['nome'],
            'plan_codigo_unidade' => $tratar['cod._unidade'],
            'plan_quantidade' => $tratar['quantidade'],
            'plan_valor_unitario' => $tratar['valor_unitario'],
            'plan_valor_parcial' => $tratar['valor_parcial'],
        ];
    }

}