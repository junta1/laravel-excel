<?php
/**
 * Created by PhpStorm.
 * User: administrador
 * Date: 28/05/18
 * Time: 02:00
 */

namespace Excel\Http\Controller;

use Excel\Planilha;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Maatwebsite\Excel\Excel;

class PlanilhaController extends Controller
{
    public function index(Excel $excel, Planilha $export)
    {
        return $excel->download($export, 'planilha.xlsx');
    }
}