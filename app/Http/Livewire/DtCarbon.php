<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class DtCarbon extends Component
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
        //  $this->date=  $date->isoFormat('Do YYYY');

        return view('livewire.dt-carbon');
    }
}
