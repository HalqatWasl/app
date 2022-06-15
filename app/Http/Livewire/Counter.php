<?php

namespace App\Http\Livewire;

use App\Models\Directorate;
use App\Models\Province;
use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public $select1;
    public $msg="hgh";
    public $provinces;
    public $directorates =null;

    public function sel()
    {
      $this->msg=$this->select1;
      $this->directorates =Directorate::all()->where('province_id',$this->select1);
    }

    // public function increment()
    // {
    //     $this->count++;
    // }

    public function render()
    {
        $this->provinces = Province::all();
        return view('livewire.counter');
    }
}
