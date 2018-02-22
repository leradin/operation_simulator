<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\DeviceType;
use SimulatorOperation\Computer;
use SimulatorOperation\Device;
use Illuminate\Http\Request;
use Lang;

class DeviceController extends Controller
{
    private $menu = 'catalog/device';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $devices = Device::with('deviceType')->get();
        return view('catalogs.device.index',compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $computers = Computer::get()->pluck('full_name', 'id');
        $deviceTypes = DeviceType::pluck('name', 'id');
        return view('catalogs.device.create',['deviceTypes' => $deviceTypes,'computers' => $computers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $device = Device::create($request->except('_token'));
        $deviceType = DeviceType::find($request->device_type_id);
        $deviceType->devices()->save($device);
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_device');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $computers = Computer::get()->pluck('full_name', 'id');
        $deviceTypes = DeviceType::pluck('name', 'id');
        return view('catalogs.device.edit',['device' => $device,'deviceTypes' => $deviceTypes,'computers' => $computers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $device->fill($request->except(['_token']));
        $device->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_device');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        $device->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_device');
        return redirect($this->menu)->with('message',$message);
    }
}
