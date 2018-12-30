<?php

namespace App\Http\Controllers\api;

use App\Commission;
use App\Http\Resources\CommissionResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CommissionAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return CommissionResource::collection(Commission::all());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function show(Commission $commission)
    {
      return new CommissionResource($commission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function edit(Commission $commission)
    {
        //
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
      $validator = Validator::make($request->all(), [
        'name' => 'alpha',
        'email' => 'email',
        'type' => 'integer|between:0,5',
        'commercial' => 'boolean',
        'status' => 'integer|between:0,5'
      ]);

      if ($validator->fails())
        return ['response' => $validator->messages(), 'success' => false];

      $data = $request->all();
      $commission->fill($data);

      $commission->save();

      return new CommissionResource($commission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commission $commission)
    {
        //
    }
}
