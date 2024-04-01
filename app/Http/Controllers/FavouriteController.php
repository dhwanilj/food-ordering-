<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dishes;
use App\Models\Orders;
use App\Models\DishImage;
use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FavouriteController extends Controller
{
    function __construct(){
        $this->middleware('auth',['except'=>['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $favourites = Dishes::whereHas('favourite',function($query){
            return $query->whereRaw('users.id = ?',Auth::id());
            })->get();
        return view('favourite')->with('favourites',$favourites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        if($user->role != 'Customer'){
            abort(403,"Can not access");
        }

        
        $favourite = new Favourite();
        $favourite->user_id=Auth::id();
        $favourite->dish_id=$request->dish_id;
        $this->validate($request,[
            'dish_id'=>[
            Rule::unique('favourites')->where(function ($query) {
                return $query->where('user_id',Auth::id());
            })],
        ]);
        
        $favourite->save();
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
