<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;


class TableUser extends Component
{

    protected $paginationTheme = 'bootstrap';

    public $search;
    public $active;
    public $user_id;

    public function is_active1($id){


        $active =User::where('id',$id)->first();
            if( $active->is_active == 1 ){
                User::where('id',$id)->update(['is_active' => 0 ]);
            }
            else{
                User::where('id',$id)->update(['is_active' => 1 ]);
            }



    }
    use WithPagination;

    public function render()
    {
        $search ='%'.$this->search.'%';

        return view('livewire.dashboard.table-user',
                  ['users' => User::where('name','LIKE',$search)->paginate(10)]);
    }
}
