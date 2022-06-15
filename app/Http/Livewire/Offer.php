<?php

namespace App\Http\Livewire;

use App\Models\Offer as ModelsOffer;
use Livewire\Component;
use Livewire\WithPagination;


class Offer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public  $open_work_id=null ;

    public function render()
    {
        // return view('livewire.offer', ['offers'=>  ModelsOffer::paginate(3) ]);
        return view('livewire.offer', ['offers'=>  ModelsOffer::where('open_work_id',$this->open_work_id)->paginate(3) ]);
    }
}
