<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Models\Departement;
use App\Models\Departement_type;
use App\Models\User;
use App\Models\Work;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination;
use Livewire\WithPagination;

class WorksController extends Controller
{

 public function index(){

    $works=Work::paginate(2);

        return view('works.index',['works'=> $works]);
 }

 public function create(){

    $departements=Departement::all();
    $departement_types=Departement_type::all();
    // $citys=City::all();
   return view('works.add', ['departement_types'=>$departement_types,'departements'=>$departements]);
}

 public function store(Request $request){


    if($request->hasFile('imageFile')){


        foreach($request->file('imageFile') as $image){

            $filename=$image->getClientOriginalName();
            $image->storeAs('imagesWorks',$filename,'public');
            $imageFile[] =$filename;
        }


        $work =new Work();
        $work->user_id = auth()->id();
        $work->dep_id = 1;
        $work->titel = $request->title;
        $work->description = $request->description;
        $work->images =json_encode($imageFile);
        $work->dep_types =json_encode( $request->dep_types);
        $work->is_active = 1;
$work->save();

    }



    //  Work::create([
    //      'user_id'     => auth()->id(),
    //      'dep_id'      => 1,
    //      'titel'       => $request->title,
    //      'description' => $request->description,
    //      'images'      => ,
    //      'dep_types'   => $request->dep_types,
    //      'is_active'   => 1,

    //  ]);

     return redirect()->route('work.create')->with('success','تم اضافة العمل الى  معرض الاعمال');
 }
}
