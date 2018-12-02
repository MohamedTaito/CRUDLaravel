<?php

namespace taskk\Http\Controllers;

use Illuminate\Http\Request;
use \taskk\companies;

class CompanyController extends Controller
{
  public $timestamps = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $company = companies::where('deactivate', 0)->paginate(10);
        return view('Data.Company', compact('company'));
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'site' => 'required',
      ]);
        companies::create($request->all());
        return console.log('hello');

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
      $compa = companies::findOrFail($request->company_id);
      $compa->update($request->all());
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $compa = companies::findOrFail($request->company_id);
      $compa->delete();
      return back();
    }
}
