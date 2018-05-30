<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: administrador
 * Date: 28/05/18
 * Time: 02:33
 */

namespace Excel\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanilhaModel extends Model
{
    protected $table = "planilha";

    protected $primaryKey = "id_planilha";

    use SoftDeletes;
    protected $dates = ['deleted_at'];

}