<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Departement;
use App\Models\Directorate;
use App\Models\Evaluation;
use App\Models\Province;
use Illuminate\Support\Facades\DB;

use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        
        $works=Work::all()->where('user_id',Auth::user()->id);
        $eval=DB::table('evaluations')->where('user_id',Auth::user()->id)->join('users','evaluations.user_id_eval','=','users.id')->get();
        $eval_sum=Evaluation::all()->where('user_id',Auth::user()->id)->sum('evaluation');
        $eval_count=Evaluation::all()->where('user_id',Auth::user()->id)->count('evaluation');

        // setlocale(LC_TIME,'ar_AR');


        // $citys=City::all();
       return view('profile.index', [
           'works' =>$works,
           'eval'         =>$eval,
           'eval_sum'     =>$eval_sum,
           'eval_count'   =>$eval_count]);
    }

    public function eidt(){
        $dep=Departement::all();
        $citys=DB::table('citys')->where('id',Auth::user()->citys_id)->get('name_city')->first();
         $departements=Departement::all();
        // $citys=DB::table('citys')->get();
        // $citys=City::all();
       return view('settings.index', compact('citys','dep'));

    }

    public function upload(Request $request){

        if($request->hasFile('image')){
            $filename=$request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
             Auth()->user()->update(['image'=>$filename]);
        }

        return redirect()->back()->with('success','تم تغيير الصورة الشخصية بنجاح ');
    }

    // update
    public function update(Request $request){

        // $type_user=null;
        // if($request->user_type == true){
        //     $type_user=2;

        // }elseif($request->user_type == true){
        //     $type_user=3;
        // }else{
        //     $type_user=null;
        // }

        Auth()->user()->update(['name'           => $request->name  ,
                                'user_type'      => $request->user_type,
                                'departement_id' => $request->departement_id ,
                                'citys_id'       => $request->citys_id ,
                                'description'    => $request->description]
        );

        return redirect()->back()->with('success','تم التعديل بنجاح ');
    }

    public function updateCitys(Request $request){



        Auth()->user()->update(['citys_id'       => $request->directorate_id ]);

        return redirect()->back()->with('success','تم التعديل بنجاح ');
    }
}
