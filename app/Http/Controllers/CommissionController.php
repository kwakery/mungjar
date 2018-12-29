<?php

namespace App\Http\Controllers;

use App\Commission;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
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
        return view('commissions.create');
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
          'duedate' => 'required',
          'type' => 'required|integer|between:1,4',
          'commercial' => 'required|boolean',
          'message' => 'required',
          'tos' => 'required|accepted'
        ]);

        $input = $request->all();
        $token = str_random(8);

        /* Create commission */
        $commission = new Commission;
        $commission->name = $input['name'];
        $commission->email = $input['email'];
        $commission->duedate = $input['duedate'];
        $commission->type = $input['type'];
        $commission->commercial = $input['commercial'];
        $commission->message = $input['message'];

        /* Store commission */
        $commission->save();

        // Redirect
        return view('commissions.success', ['token' => $token]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function show(Commission $commission)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function edit(Commission $commission)
    {
        return view('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commission $commission)
    {
        return view('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commission $commission)
    {
        return view('/');
    }
}
