<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\User;
use App\Models\Work;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProfileController;

class UserController extends Controller
{

     /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)
    {


        $user=User::where('username',$request->username)->first();

        if($user==null){
            return "ud";
        }
    
        $eval=DB::table('evaluations')->where('user_id',$user->id)->join('users','evaluations.user_id_eval','=','users.id')->get();
        $eval_sum=Evaluation::all()->where('user_id',$user->id)->sum('evaluation');
        $eval_count=Evaluation::all()->where('user_id',$user->id)->count('evaluation');



      

       return view('user.index', [
           'user'         =>$user,
           'eval'         =>$eval,
          'eval_sum'     =>$eval_sum,
           'eval_count'   =>$eval_count
        ]);


    }



}
