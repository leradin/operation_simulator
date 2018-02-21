<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\Cabin;
use SimulatorOperation\ComputerType;
use SimulatorOperation\Computer;
use SimulatorOperation\Device;
use Illuminate\Http\Request;
use Lang;

class ComputerController extends Controller
{
    private $menu = 'catalog/computer';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = Computer::with('computerType')->get();
        return view('catalogs.computer.index',compact('computers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabins = Cabin::pluck('name', 'id');
        $devices = Device::get()->pluck('full_name', 'id');
        $computerTypes = ComputerType::pluck('name', 'id');
        return view('catalogs.computer.create',['cabins' => $cabins,
                                                'computerTypes' => $computerTypes,
                                                'devices' => $devices]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $computer = Computer::create($request->except('_token'));
        $computerType = ComputerType::find($request->computer_type_id);
        $computerType->computers()->save($computer);
        foreach ($request->device_ids as $deviceId) {
            $device = Device::find($computerId);
            $computer->devices()->save($device);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_computer');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function show(Computer $computer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function edit(Computer $computer)
    {
        $cabins = Cabin::pluck('name', 'id');
        $computerTypes = ComputerType::pluck('name', 'id');
        $devices = Device::get()->pluck('full_name', 'id');
        return view('catalogs.computer.edit',['computer' => $computer,'cabins'=>$cabins,'computerTypes' => $computerTypes,'devices' => $devices]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Computer $computer)
    {
        $computer->fill($request->except(['_token']));
        $computer->save();
        foreach ($request->device_ids as $deviceId) {
            $device = Device::find($deviceId);
            $computer->devices()->save($device);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_computer');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Computer $computer)
    {
        $computer->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_computer');
        return redirect($this->menu)->with('message',$message);
    }
}
