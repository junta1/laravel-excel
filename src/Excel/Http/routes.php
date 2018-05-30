<?php

Route::get('export','\Excel\Http\Controller\PlanilhaController@export');

Route::get('import','\Excel\Http\Controller\PlanilhaController@import');
