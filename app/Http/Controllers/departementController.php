<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class departementController extends Controller
{
   public function s(){
    // Departement::create([
    //     'name' => 'ssds' ,
    //     'is_active' => 1 ,

    // ]);
        return Departement::all('name');
    }
}
