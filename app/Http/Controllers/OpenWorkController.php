<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Departement_type;
use App\Models\Open_work;
use Illuminate\Support\Facades\DB;
use App\Providers\AppServiceProvider;
use Whoops\Run;

class OpenWorkController extends Controller
{


    public function index(Request $request){
         $departement_id =null;
         $province_id = null;
         $directorate_id = null;

        if ($request->departement_id) {
             $departement_id=$request->departement_id;
        }
        if ($request->province_id) {
            $province_id=$request->province_id;
       }
       if ($request->departement_id) {
        $directorate_id=$request->directorate_id;
   }

    //  $currentPath = explode('/',substr_replace(request()->path(),'',0,0));

      $departements=Departement::all();
        return view('openWorks.index',compact('departement_id','province_id','directorate_id','departements'));
    }





    public function create(){

        $departements=Departement::all();
        $departement_types=Departement_type::all();
        // $citys=City::all();
       return view('openWorks.add', compact('departement_types','departements'));
    }

    public function store(Request $request){

    //   return $request;
         Open_work::create([
             'user_id'     => auth()->id(),
             'departement_id'      => $request->departement_id,
             'province_id'       => $request->province_id,
             'directorate_id' => $request->directorate_id,
             'title'      => $request->title,
             'description'   => $request->description,
             'num_day'   => $request->num_day,
             'pric'   => $request->pric,
             'address'   => $request->address,
             'stage'   => $request->address,
             'is_active'   => 1,

         ]);

         return redirect()->route('work.create')->with('success','تم اضافة العمل الى  معرض الاعمال');
    }

    public function show(Request $request){


       $open_work = Open_work::where('id',$request->open_work)->first();

       return view('openWorks.show',compact('open_work'));
    }

}
