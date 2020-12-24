<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;

class ClubBackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::paginate(10);
        return view('content.club.index', ['clubs' => $clubs]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('content.club.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
          'name'     => 'required|min:3',
          'post_code'     => 'required',
          'city'     => 'required',
          'email'     => 'required',
          'telephone'     => 'required',
          'mobile'     => 'required',
          'contact_person'     => 'required',
          'short_description'     => 'required',
        ];
        $request->validate($rules);

        $club = Club::create($request->all());
        //dd($club);
        return redirect()->route('clubs.index')->with('Club added successfully');
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
        $club = Club::findOrFail($id);
        return view('content.club.show', ['club' => $club]);
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
        $club = Club::findOrFail($id);
        return view('content.club.edit',compact('club'));
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
        $rules = [
          'name'     => 'required|min:3',
          'post_code'     => 'required',
          'city'     => 'required',
          'email'     => 'required',
          'telephone'     => 'required',
          'mobile'     => 'required',
          'contact_person'     => 'required',
          'short_description'     => 'required',
        ];
        $request->validate($rules);
        $club = Club::findOrFail($id);

        $club->update($request->all());
        //dd($club);
        return redirect()->route('clubs.index')->with('Club updated successfully');
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
        $club = Club::findOrFail($id)->delete();
        return redirect()->route('clubs.index')->with('Club deleted successfully');   
    }
}
