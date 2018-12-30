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
          'type' => 'required|integer|between:0,5',
          'commercial' => 'required|boolean',
          'info' => 'required',
          'tos' => 'required|accepted',
          'g-recaptcha-response' => 'required|captcha'
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
        $commission->info = $input['info'];
        $commission->token = $token;

        /* Store commission */
        $commission->save();

        /* Send webhook */
        $route = route('commissions.show', $token);
        $commercial = $input['commercial'] ? 'Yes' : 'No';
        $commission_text = "**{$input['name']} made a commission!**\nPayPal Email: {$input['email']}\nDate needed by: {$input['duedate']}\nCommission Type:{$input['type']}\nCommercial Use? {$commercial}\nAdditional Information: {$input['info']}\n{$route}\n@everyone";
        sendCommission($commission_text);

        // Redirect
        //return redirect('/commissions/'.$token.);
        return view('commissions.success')->with('token', $token);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function show(Commission $commission)
    {
        $token = $commission->token;
        return view('commissions.show', ['commission' => $commission]);
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
