<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\Cabin;
use SimulatorOperation\Computer;
use Illuminate\Http\Request;
use Validator;
use Lang;

class CabinController extends Controller
{

    private $menu = 'catalog/cabin';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabins = Cabin::orderBy('updated_at','asc')->get();
        return view('catalogs.cabin.index',compact('cabins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $computers = Computer::get()->pluck('full_name','id');
        return view('catalogs.cabin.create',['computers' => $computers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->except('_token'),[
            'id' => 'required|integer|unique:cabins',
            'name' => 'required|max:25|String',
            'ip_address_arduino' => 'required|ipv4',
            'mac_address_arduino' => 'required|string',
            'ip_address_camera' => 'required|ipv4'
        ]);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $cabin = Cabin::create($request->except('_token'));
        foreach ($request->computer_ids as $computerId) {
            $computer = Computer::find($computerId);
            $cabin->computers()->save($computer);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_cabin');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Cabin  $cabin
     * @return \Illuminate\Http\Response
     */
    public function show(Cabin $cabin)
    {
        $computers = Cabin::with('computers')->find($cabin->id);
        //dd($computers);
        return response()->json($computers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\Cabin  $cabin
     * @return \Illuminate\Http\Response
     */
    public function edit(Cabin $cabin)
    {
        $computers = Computer::get()->pluck('full_name','id');
        return view('catalogs.cabin.edit',['cabin' => $cabin,'computers' => $computers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\Cabin  $cabin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cabin $cabin)
    {
        $cabin->fill($request->except(['_token']));
        $cabin->save();
        
        $computers = [];
        foreach ($cabin->computers()->get(['id'])->toArray() as &$computer) {
            array_push($computers, $computer['id']); 
        }
        $result=array_diff($computers,$request->computer_ids);

        foreach ($result as $value) {
            $computer = Computer::find($value);
            $computer->cabin_id = null;
            $computer->save();
        }
        
        foreach ($request->computer_ids as $computerId) {
            $computer = Computer::find($computerId);
            $cabin->computers()->save($computer);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_cabin');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\Cabin  $cabin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cabin $cabin)
    {
        $cabin->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_cabin');
        return redirect($this->menu)->with('message',$message);
    }
}
