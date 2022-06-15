<?php

namespace App\Http\Livewire\Dashboard;


use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;

class CardCount extends Component
{
    public $user=null;
    public $date="";

    public $title="sdsdsd";
    public $color="revenue-card";
    public $icon ="bi-person-plus-fill";

    public $userCount="";

    public $ratio;
    public function render()
    {
        $count = User::count();
        $countToday = User::whereDate('created_at',Carbon::today())->count();
        $countYestoday = User::whereDate('created_at',Carbon::today())->count();

        if(! $this->user ){
            
            $this->userCount = $count;
        }
        else
        {
            $this->userCount = $countToday;
        }
       
        return view('livewire.dashboard.card-count');
    }
}
