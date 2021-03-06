<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    public function index()
    {
        $listings=Listing::orderBy('created_at','desc')->get();
        return view('listings.index')->with('listings',$listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=auth()->user()->id;
        $rules=[
            'name'=>'required',
            'email'=>'email',
            /*'website'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'bio'=>'required',*/
        ];
        $this->validate($request,$rules);
        $l=new Listing();
        $l->name=$request->name;
        $l->email=$request->email;
        $l->website=$request->website;
        $l->address=$request->address;
        $l->phone=$request->phone;
        $l->bio=$request->bio;
        $l->user_id=$user_id;
        $l->save();
        return redirect()->back()->with('status','Listing Created !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing=Listing::findOrFail($id);
        return view('listings.show')->with('listing',$listing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing=Listing::findOrFail($id);
        return view('listings.edit')->with('listing',$listing);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $rules=[
            'name'=>'required',
            'email'=>'email',
            /*'website'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'bio'=>'required',*/
        ];
        $this->validate($request,$rules);
        $l=Listing::findOrFail($id);
        $l->name=$request->name;
        $l->email=$request->email;
        $l->website=$request->website;
        $l->address=$request->address;
        $l->phone=$request->phone;
        $l->bio=$request->bio;
        $l->user_id=auth()->user()->id;
        $l->save();
        return redirect()->back()->with('status','Listing Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing=Listing::findOrFail($id);
        $listing->delete();
        return redirect('/dashboard')->with('status','Listing Deleted !!');
    }
}
