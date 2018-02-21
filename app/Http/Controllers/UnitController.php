<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\UnitType;
use SimulatorOperation\Unit;
use SimulatorOperation\Sensor;
use Illuminate\Http\Request;
use Lang;

class UnitController extends Controller
{
    private $menu = 'catalog/unit';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::with('unitType')->get();
        return view('catalogs.unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unitTypes = UnitType::pluck('name', 'id');
        $sensors = Sensor::pluck('name','id');
        return view('catalogs.unit.create',['unitTypes' => $unitTypes,'sensors' => $sensors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->isExistFolder('unitImage')){
            $this->createFolder('unitImage');
        }

        if($this->savedFileLocal($request->file('image'),$request['name'].'.'.strtolower($request->image->getClientOriginalExtension()))){
            $unit = Unit::create([
                'station' => $request->station,
                'numeral' => $request->numeral,
                'name' => $request->name,
                'serial_number' => $request->serial_number,
                'country' => $request->country,
                'unit_type_id' => $request->unit_type_id,
                'image' => 'unitImage/'.$request->name.'.'.strtolower($request->image->getClientOriginalExtension())
            ]);
            $unitType = UnitType::find($request->unit_type_id);
            $unitType->units()->save($unit);

            foreach ($request->sensor_ids as $sensorId) {
                $unit->sensors()->attach($sensorId);
            }

            $message['type'] = 'success';
            $message['status'] = Lang::get('messages.success_unit');
            return redirect($this->menu)->with('message',$message);
        } 

    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        try{
            return \Response::Download(storage_path().'/app/'.$unit->image);
        }catch(\Exception $error){
            return redirect('/unit')->with('message',$error->getMessage())->with('error',1);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $unitTypes = UnitType::pluck('name', 'id');
        $sensors = Sensor::pluck('name','id');
        return view('catalogs.unit.edit',['unit' => $unit,'unitTypes' => $unitTypes,'sensors' => $sensors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        if(!$this->isExistFolder('unitImage')){
            $this->createFolder('unitImage');
        }

        if($this->savedFileLocal($request->file('image'),$request['name'].'.'.strtolower($request->image->getClientOriginalExtension()))){
            $unit->fill([
                'station' => $request->station,
                'numeral' => $request->numeral,
                'name' => $request->name,
                'serial_number' => $request->serial_number,
                'country' => $request->country,
                'unit_type_id' => $request->unit_type_id,
                'image' => 'unitImage/'.$request->name.'.'.strtolower($request->image->getClientOriginalExtension())
            ]);
            $unitType = UnitType::find($request->unit_type_id);
            $unitType->units()->save($unit);

            $unit->sensors()->detach();
            foreach ($request->sensor_ids as $sensorId) {
                $unit->sensors()->attach($sensorId);
            }

            $message['type'] = 'success';
            $message['status'] = Lang::get('messages.success_unit');
            return redirect($this->menu)->with('message',$message);
        } 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_unit');
        return redirect($this->menu)->with('message',$message);
    }

    /**
    * Download file 
    *
    */
    public function downloadFile($id){
        $unit = Unit::find($id);
        return \Storage::get($unit->image);
    }

    /**
    * Save file local
    *
    */
    private function savedFileLocal($file,$name){
        $saved = false;
        try{
            \Storage::disk('local')->put('unitImage/'.$name, \File::get($file));
            $saved = true;
        }catch(\Exception $error){
            dd($error);
        }
       return $saved;
    }


    /**
    * Verify exists folder
    *
    */
    private function isExistFolder($nameFolder){
        $exists = 1;
        if(!\File::exists(storage_path().'/app/'.$nameFolder)) {
            $exists = 0;
        }
        return $exists; 
    }

    /**
    * Create folder
    *
    */
    private function createFolder($name){
        $response = \File::makeDirectory(storage_path().'/app/'.$name, 0775, true);
        return $response;
    }
}
