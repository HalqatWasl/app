<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public function index(){

        // $works=DB::table('users')->join('works','users.id', '=','works.user_id')->get();

        //     return view('works.index',['works'=> $works]);
     }

     public function create(){

    //     $departements=Departement::all();
    //     $departement_types=Departement_type::all();
    //     // $citys=City::all();
    //    return view('works.add', ['departement_types'=>$departement_types,'departements'=>$departements]);
    }

     public function store(Request $request)
     {

        $user = User::find($request->id);

        if(!$user)
        {
            return response([
                'message' => 'Post not found.'
            ], 403);
        }

        $evaluation = $user->evaluation()->where('user_id_eval', auth()->user()->id)->first();

        if(!$evaluation)
        {
            Evaluation::create([
                'user_id'       => $request->user_id,
                'user_id_eval'  => Auth::user()->id,
                'evaluation'    => $request->evaluation,
                'comment'       => $request->comment,
                'reply_to_comment' =>'0'
            ]);
   
            return redirect()->back()->with('success','تم التقييم بنجاح ');

        }
        else{

            return redirect()->back()->with('error','لايمكنك التقييم اكثر من مره');
        }
           
            
        

       


     }

     public function getEvaluation(int $user)
     {
       return  $eval_sum=Evaluation::all()->where('user_id',$user)->sum('evaluation');
     }

}
