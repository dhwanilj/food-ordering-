<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dishes;
use App\Models\Orders;
use App\Models\DishImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DishesController extends Controller
{
    function __construct(){
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('add_dishes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>['required','min:3',
            Rule::unique('dishes')->where(function ($query) {
                return $query->where('restaurant_id',Auth::id());
            })],
            'price'=>'required|numeric|gt:0',
             
        ]);
        $dish = new Dishes();
        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->restaurant_id = Auth::id();
        $dish->discount = $request->discount;
        if(($request->discount)!=0){
            $dish->discounted_price = (($request->price)-(($request->discount/100)*$request->price));
        }
        $dish->save();
        return redirect("user/$dish->restaurant_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $images =  dishes::find($id)->image;
        $dish = Dishes::find($id);    
        return view('view_dish_image')->with('images',$images)->with('dish',$dish)->with('id',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userids = dishes::whereRaw('id = ?',$id)->get();
        $user=$userids[0];
        $userid = $user->restaurant_id;
        if(Auth::id()!=$userid){
            abort(403,"Can not access");
        }
        $dishes=dishes::whereRaw('id = ?',$id)->get();
        $dish = $dishes[0];
        return view('dish_edit')->with('dish',$dish);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>['required','min:3',
            Rule::unique('dishes')->ignore($id)->where(function ($query) {
                return $query->where('restaurant_id',Auth::id());
            })],
            'price'=>'required|numeric|gt:0',    
        ]);
        $dish = dishes::find($id);
        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->restaurant_id = Auth::id();
        $dish->discount = $request->discount;
        if(($request->discount)!=NULL){
            $dish->discounted_price = (($request->price)-(($request->discount/100)*$request->price));
        }
        if(($request->discount)==NULL){
            $dish->discounted_price=NULL;
        }
        
        $dish->save();
        return redirect("user/$dish->restaurant_id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userids = Dishes::whereRaw('id = ?',$id)->get();
        $user=$userids[0];
        $userid = $user->restaurant_id;
        if(Auth::id()!=$userid){
            abort(403,"Can not access");
        }
        $dish = Dishes::find($id);
        $dish->delete();
        return redirect("user/$dish->restaurant_id");
    }
}
