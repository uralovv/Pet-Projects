<?php
namespace App\Providers;
use App\Models\Course;
use Illuminate\Support\ServiceProvider;

class DynamicDropdown extends ServiceProvider{
public function boot(){
    view()->composer('*',function($view){
        $view->with('classname_array',Course::all());
    });
}
}


