<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class CountUserNew extends Component
{

    public $count;
    public $count1; 

     

    public function render()
    {
        $count = User::whereDate('created_at',Carbon::today())->count();
        $this->count=number_format( $count ,'0');
        $count = Carbon::today();
        $countToday = User::whereDate('created_at',Carbon::today())->count();
        $countYestoday = User::whereDate('created_at',Carbon::yesterday())->count();
         
         $this->count1 =$countToday - $countYestoday;

        // if($count!=0){
        //     $this->count1=number_format( User::count() / $count ,'2');
        // }

        return view('livewire.dashboard.count-user-new');
    }
}
