<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Date extends Component
{

    public $dt="";
    public $date='s';
 //    public $citys;
     //
     // return
    
    public function render()
    {
        $date=  Carbon::parse($this->dt)->locale('ar_AR');
 
        $this->date=  $date->diffForHumans();
        return view('livewire.date');
 
    }
}
