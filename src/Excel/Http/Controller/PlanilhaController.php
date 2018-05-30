<?php
/**
 * Created by PhpStorm.
 * User: administrador
 * Date: 28/05/18
 * Time: 02:00
 */

namespace Excel\Http\Controller;

use App\Http\Controllers\Controller;
use Excel\Planilha;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;


class PlanilhaController extends Controller
{
    protected $negocio;

    public function __construct(Planilha $negocio)
    {
        $this->negocio = $negocio;
    }

    public function export()
    {
        return $this->negocio->export();
    }

    public function import()
    {
        return $this->negocio->import();
    }
}