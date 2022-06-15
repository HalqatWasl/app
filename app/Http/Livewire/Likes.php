<?php

namespace App\Http\Livewire;
use App\Models\Work;
use App\Models\Like;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Likes extends Component
{

    public $heart_fill="0";
    public $like_count=0;
    public $s;
    public $work_id;
    public $user_id;

    protected $listeners = ['postAdded' => 'likeClick'];

    // public function like_count(){
    //     $like_count=Like::where('work_id',$this->work_id)->count('*');
    //     $this->like_count = $like_count;
    // }

    public function likeClick(){
        // $this->emit('Links');

        if ($this->heart_fill =="0") {

            if (Auth::user()) {
                $this->heart_fill ="1";
              Like::create(['user_id'=>Auth::user()->id,'work_id'=>$this->work_id,'like'=>1]);
            }

        }else{
            $this->heart_fill ="0";
            Like::where('work_id','=',$this->work_id)->where('user_id',Auth::user()->id)->delete();


        }


    }

    public function addLike(){
       Like::create(['work_id'=>$this->work_id,'user_id'=>Auth::user()->id,'like'=>'1']);
    }


    public function render()
    {
        $like_count=Like::where('work_id',$this->work_id)->count('*');
        $this->like_count = $like_count;

        if (Auth::user()) {
            $like =  DB::select('select * from likes where   work_id = ? and user_id = ?', [$this->work_id,auth()->user()->id]);
        if ($like) {
            $this->s=$like_count;
            $this->heart_fill="1";

        }
        }


        return view('livewire.likes');
    }

}
