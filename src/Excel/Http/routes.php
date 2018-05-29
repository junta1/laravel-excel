<?php

Route::get('export-fast','\Excel\Http\Controller\PlanilhaController@export');

Route::post('import-fast','\Excel\Http\Controller\PlanilhaController@import');



