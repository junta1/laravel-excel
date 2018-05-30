<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Planilha extends Migration
{
    /**
     * Criando migration em pasta específica
     * php artisan make:migration nomeDaMigration --path=database/migrations/NomeDoDiretorio
     *
     * Gerando migrate em uma pasta específica
     * php artisan migrate --path=database/migrations/NomeDoDiretorio --database=nomeDaConexao(Caso tenha multiplas conexoes)
     */
    public function up()
    {
        Schema::create('planilha', function (Blueprint $table) {
            $table->increments('id_planilha');
            $table->string('plan_codigo_tarefa')->nullable();
            $table->string('plan_nome')->nullable();
            $table->string('plan_codigo_unidade')->nullable();
            $table->integer('plan_quantidade')->nullable();
            $table->double('plan_valor_unitario')->nullable();
            $table->double('plan_valor_parcial')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('planilha');
    }
}
