<?php

namespace App\Http\Controllers;

use App\Http\Resources\PolicyResource;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return PolicyResource::collection(Policy::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $policy = new Policy();
        $policy->text = $request->text;
        $policy->etext = $request->etext;
        $policy->save();
        return $policy;
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
        $policy = Policy::findOrFail($id);
        $policy->text = $request->text;
        $policy->etext = $request->etext;
        $policy->save();
        return $policy;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PolicyResource(Policy::findOrFail($id));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $policy = Policy::findOrFail($id);
        $policy->delete();
    }
}
