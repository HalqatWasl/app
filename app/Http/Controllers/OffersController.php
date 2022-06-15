<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Open_work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OffersController extends Controller
{


    public function store(Request $request){

        $work = Open_work::find($request->id);

        if(!$work)
        {
            return response([
                'message' => 'Post not found.'
            ], 403);
        }

        $offers = $work->offers()->where('user_id', auth()->user()->id)->first();

        if(!$offers)
        {
        //   return $request;
             Offer::create([
                 'open_work_id' =>$request->id,
                 'user_id'     => auth()->id(),
                 'description'   => $request->description,
                 'num_day'   => $request->num_day,
                 'pric'   => $request->pric,
                 'statu'   => '1',
                 'is_active'   => 1,

             ]);
             return redirect()->route('openwork.show',['open_work'=> $request->id])->with('success','تم اضافة العرض ');
        }

            //  return    $request->id;
            return redirect()->route('openwork.show',['open_work'=> $request->id])->with('error','لم يضاف العرض  - انت مضيف عرض !');
        }
}
