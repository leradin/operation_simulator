<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\Stage;
use SimulatorOperation\Cabin;
use SimulatorOperation\Unit;
use Illuminate\Http\Request;
use Lang;

class StageController extends Controller
{
    private $menu = 'stage';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::All();
        return view('stage.index',compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabins = Cabin::get()->pluck('name','id');
        $units = Unit::get()->pluck('name_with_numeral','id');
        return view('stage.create',['cabins' => $cabins,
                                            'units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stage = Stage::create($request->except('_token','cabin_ids'));
        foreach ($request->cabin_ids as $cabinId) {
            $parameters = explode("&", $request->$cabinId);
            $initPosition = str_replace("%2C", ",",explode('=',$parameters[5])[1]);
            $stage->cabins()->attach($cabinId,['course' => explode('=',$parameters[1])[1], 'speed' => explode('=',$parameters[2])[1], 'altitude' => explode('=',$parameters[3])[1], 'init_position' => $initPosition]);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_stage');
        return redirect($this->menu)->with('message',$message);

    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stage $stage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage)
    {
        $stage->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_stage');
        return redirect($this->menu)->with('message',$message);
    }
}
