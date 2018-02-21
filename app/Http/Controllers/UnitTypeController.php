<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\UnitType;
use SimulatorOperation\MathematicalModel;
use Illuminate\Http\Request;
use Lang;

class UnitTypeController extends Controller
{
    private $menu = 'catalog/unit_type';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitTypes = UnitType::All();
        return view('catalogs.unitType.index',compact('unitTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mathematicalModels = MathematicalModel::pluck('name', 'id');
        return view('catalogs.unitType.create',['mathematicalModels' => $mathematicalModels]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unitType = UnitType::create($request->except('_token'));
        if($request->mathematical_model_id){
            $mathematicalModel = MathematicalModel::find($request->mathematical_model_id);
            $unitType->mathematicalModel->save($mathematicalModel);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_unit_type');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function show(UnitType $unitType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitType $unitType)
    {
        $mathematicalModels = MathematicalModel::pluck('name', 'id');
        return view('catalogs.unitType.edit',['unitType' => $unitType,'mathematicalModels' => $mathematicalModels]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitType $unitType)
    {
        $unitType->fill($request->except(['_token']));
        $unitType->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_unit_type');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitType $unitType)
    {
        $unitType->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_unit_type');
        return redirect($this->menu)->with('message',$message);
    }
}
