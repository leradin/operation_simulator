<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\MathematicalModel;
use SimulatorOperation\UnitType;
use Illuminate\Http\Request;
use Lang;
use Validator;

class MathematicalModelController extends Controller
{
    private $menu = 'catalog/mathematical_model';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mathematicalModels = MathematicalModel::with('unitType')->get();
        return view('catalogs.mathematicalModel.index',compact('mathematicalModels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unitTypes = UnitType::pluck('name', 'id');
        return view('catalogs.mathematicalModel.create',['unitTypes' => $unitTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make([
            'name'      => $request->name,
            'path' => strtolower($request->path->getClientOriginalExtension())
            ], [
            'name' => 'required|max:50|regex:/(^[A-Za-z0-9 ]+$)+/|unique:mathematical_models',
            'path' => 'required|in:js'
        ]);

        // 
        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        if(!$this->isExistFolder('mathematicalModel')){
            $this->createFolder('mathematicalModel');
        }

        if($this->savedFileLocal($request->file('path'),$request['name'])){
            MathematicalModel::create([
                'name' => $request->name,
                'unit_type_id' => $request->unit_type_id ? $request->unit_type_id: null,
                'path' => 'mathematicalModel/'.$request['name'].'Model.js'
            ]);
            $message['type'] = 'success';
            $message['status'] = Lang::get('messages.success_mathematical_model');
            return redirect($this->menu)->with('message',$message);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function show(mathematicalModel $mathematicalModel)
    {
        try{
            return \Response::Download(storage_path().'/app/'.$mathematicalModel->path);
        }catch(\Exception $error){
            return redirect('/mathematical_model')->with('message',$error->getMessage())->with('error',1);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function edit(mathematicalModel $mathematicalModel)
    {
        $unitTypes = UnitType::pluck('name', 'id');
        return view('catalogs.mathematicalModel.edit',['mathematicalModel' => $mathematicalModel,'unitTypes' => $unitTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mathematicalModel $mathematicalModel)
    {

        $validator = Validator::make(['name' => $request->name,
            'path' => strtolower($request->path->getClientOriginalExtension())
            ], [
            'name' => 'required|max:50|regex:/(^[A-Za-z0-9 ]+$)+/|unique:mathematical_models,id,'.$mathematicalModel->id,
            'path' => 'required|in:js'
        ]);

        if($validator->fails() ){
            return back()
                    ->withErrors($validator)
                    ->withInput();
         }

        if ($request->hasFile('path')) {
            if(!$this->isExistFolder('mathematicalModel')){
                $this->createFolder('mathematicalModel');
            }

            if($this->savedFileLocal($request->file('path'),$request['name'])){
                \File::delete(storage_path().'/app/'.$mathematicalModel->path);
                
                $mathematicalModel->fill([
                    'name' => $request['name'],
                    'unit_type_id' => $request->unit_type_id ? $request->unit_type_id: null,
                    'path' => 'mathematicalModel/'.$request['name'].'Model.js'
                ]);
               
            } 
        }else{
            $mathematicalModel->fill([
                'name' => $request['name'],
                'unit_type_id' => $request->unit_type_id ? $request->unit_type_id: null,
            ]);
        }
        $mathematicalModel->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_mathematical_model');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(mathematicalModel $mathematicalModel)
    {
        if(\File::delete(storage_path().'/app/'.$mathematicalModel->path)){
            $mathematicalModel->delete();
            $message['type'] = 'success';
            $message['status'] = Lang::get('messages.remove_mathematical_model');
            return redirect($this->menu)->with('message',$message);
        }
    }

    /**
    * Download file 
    *
    */
    public function downloadFile($id){
        $model = MathematicalModel::find($id);
        return \Storage::get($modelo->path.'.js');
    }

    /**
    * Save file local
    *
    */
    private function savedFileLocal($file,$name){
        $saved = false;
        try{
            \Storage::disk('local')->put('mathematicalModel/'.$name.'Model.js', \File::get($file));
            $saved = true;
        }catch(\Exception $error){
            //dd($error);
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
