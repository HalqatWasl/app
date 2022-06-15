<?php

namespace App\Http\Livewire;

use App\Models\departement;
use App\Models\Directorate;
use App\Models\Open_work;
use App\Models\Province;
use Livewire\Component;

use Livewire\WithPagination;
use Carbon\Carbon;

class OpenWork extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $departement_id ;
    public $province_id  ;
    public $directorate_id ;
    public $departements;
    public $provinces;
    public $directorates;
    public $user_id;
    public $stage=1;

    public $readToLoad = false;
    public function load(){

        $this->readToLoad = true ;
    }




    public function render()
    {

         $this->departements=departement::all();
         $this->provinces=Province::all();
        // return view('livewire.open-work', ['Open_work'=> $this->readToLoad ? Open_work::paginate(1) : [],]);

        return view('livewire.open-work', ['Open_work'=>  Open_work::where('stage','LIKE',"%{$this->stage}%")
                                                                    ->where('departement_id','LIKE',"%{$this->departement_id}%")
                                                                    ->where('province_id','LIKE',"%{$this->province_id}%")
                                                                    ->where('directorate_id','LIKE',"%{$this->directorate_id}%")
                                                                    ->where('user_id','LIKE',"%{$this->user_id}%")
                                                                     ->orderBy('created_at')
                                                                     ->paginate(6) ,
                                                                    ]);
    }
}
