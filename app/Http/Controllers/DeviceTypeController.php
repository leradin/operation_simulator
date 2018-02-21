<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\DeviceType;
use Illuminate\Http\Request;
use Lang;

class DeviceTypeController extends Controller
{
    private $menu = 'catalog/device_type';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deviceTypes = DeviceType::All();
        return view('catalogs.deviceType.index',compact('deviceTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogs.deviceType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DeviceType::create($request->except('_token'));
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_device_type');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\DeviceType  $deviceType
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceType $deviceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\DeviceType  $deviceType
     * @return \Illuminate\Http\Response
     */
    public function edit(DeviceType $deviceType)
    {
        return view('catalogs.deviceType.edit',['deviceType' => $deviceType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\DeviceType  $deviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeviceType $deviceType)
    {
        $deviceType->fill($request->except(['_token']));
        $deviceType->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_device_type');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\DeviceType  $deviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeviceType $deviceType)
    {
        if(count($deviceType->devices)){
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.not_remove_device_type');
            return redirect($this->menu)->with('message',$message);
        }

        $deviceType->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_device_type');
        return redirect($this->menu)->with('message',$message);
    }
}
