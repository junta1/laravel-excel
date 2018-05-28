<?php
declare(strict_types=1);

namespace Excel;
/**
 * Created by PhpStorm.
 * User: administrador
 * Date: 28/05/18
 * Time: 01:58
 */

use Excel\Model\PlanilhaModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class Planilha implements FromCollection
{
    public function __construct(PlanilhaModel $invoices)
    {
        $this->invoices = $invoices;
    }

    public function collection()
    {
        return $this->invoices->all();
    }
}