<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\ComputerType;
use Illuminate\Http\Request;
use Lang;

class ComputerTypeController extends Controller
{
    private $menu = 'catalog/computer_type';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computerTypes = ComputerType::All();
        return view('catalogs.computerType.index',compact('computerTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogs.computerType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ComputerType::create($request->except('_token'));
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_computer_type');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\ComputerType  $computerType
     * @return \Illuminate\Http\Response
     */
    public function show(ComputerType $computerType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\ComputerType  $computerType
     * @return \Illuminate\Http\Response
     */
    public function edit(ComputerType $computerType)
    {
        return view('catalogs.computerType.edit',['computerType' => $computerType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\ComputerType  $computerType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComputerType $computerType)
    {
        $computerType->fill($request->except(['_token']));
        $computerType->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_computer_type');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\ComputerType  $computerType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComputerType $computerType)
    {
        $computerType->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_computer_type');
        return redirect($this->menu)->with('message',$message);
    }
}
