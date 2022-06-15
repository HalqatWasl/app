<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class CountUser extends Component
{
    
    public $work;
    public $workNew;
    public $bsins;
    public $bsinsNew;
    public $workOrBsins;
    public $workOrBsinsNew;

    public function render()
    {
        $this->work=User::where('user_type','1')->count();
        $this->workNew=User::where('user_type','1')->whereDate('created_at',Carbon::today())->count();

        $this->bsins=User::where('user_type','2')->count();
        $this->bsinsNew=User::where('user_type','2')->whereDate('created_at',Carbon::today())->count();

        $this->workOrBsins=User::where('user_type','3')->count();
        $this->workOrBsinsNew=User::where('user_type','3')->whereDate('created_at',Carbon::today())->count();
        

        return view('livewire.dashboard.count-user',['countUser'=> User::count() , 'countUserNew'=> User::whereDate('created_at',Carbon::today())->count()]);
    }
}
