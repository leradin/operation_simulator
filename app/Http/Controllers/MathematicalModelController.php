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
    private $connectionSshName = 'production';
    private $folderForModels = 'mathematicalModel/';
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
            'path' => strtolower($request->path->getClientOriginalExtension()),
            ], [
            'name' => 'required|max:50|regex:/(^[A-Za-z0-9 ]+$)+/|unique:mathematical_models',
            'path' => 'required|in:js',
        ]);

        // 
        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        
        $unitTypeAbbreviation = UnitType::find($request->unit_type_id)->abbreviation;
        $fileName = $unitTypeAbbreviation.'Model.js';

        if(savedFileLocal($request->file('path'),$this->folderForModels.$fileName)){
            if(savedFileRemoto($this->connectionSshName,$this->folderForModels.$fileName,env('KINECT_PATH_MODELS'))){
                
                MathematicalModel::create([
                    'name' => $request->name,
                    'unit_type_id' => $request->unit_type_id,
                    'path' => $this->folderForModels.$fileName
                ]);

                $message['type'] = 'success';
                $message['status'] = Lang::get('messages.success_mathematical_model');
                return redirect($this->menu)->with('message',$message);
            } 
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
            return downloadFile($mathematicalModel->path);
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
            'path' => strtolower($request->path->getClientOriginalExtension()),
            ], [
            'name' => 'required|max:50|regex:/(^[A-Za-z0-9 ]+$)+/|unique:mathematical_models,id,'.$mathematicalModel->id,
            'path' => 'required|in:js',
        ]);

        if($validator->fails() ){
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $mathematicalModel->fill([
            'name' => $request['name'],
            'unit_type_id' => $request->unit_type_id,
        ]);

        if ($request->hasFile('path')) {
            deletedFileLocal($mathematicalModel->path);
            deletedFileRemoto($this->connectionSshName,explode("/",$mathematicalModel->path)[1],env('KINECT_PATH_MODELS'));

            $unitTypeAbbreviation = UnitType::find($request->unit_type_id)->abbreviation;
            $fileName = $unitTypeAbbreviation.'Model.js';

            if(savedFileLocal($request->file('path'),$this->folderForModels.$fileName)){
                if(savedFileRemoto($this->connectionSshName,$this->folderForModels.$fileName,env('KINECT_PATH_MODELS'))){
                    $mathematicalModel->path = $this->folderForModels.$fileName;
                }
            }
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
    public function destroy(mathematicalModel $mathematicalModel){
        deletedFileLocal($mathematicalModel->path);
        deletedFileRemoto($this->connectionSshName,explode("/",$mathematicalModel->path)[1],env('KINECT_PATH_MODELS'));
        $mathematicalModel->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_mathematical_model');
        return redirect($this->menu)->with('message',$message);
    }

    /**
    * Download file 
    *
   
    public function downloadFile($id){
        $model = MathematicalModel::find($id);
        return \Storage::get($modelo->path.'.js');
    }

    /**
    * Save file local
    *
    
    private function savedFileLocal($file,$name){
        $saved = false;
        try{
            \Storage::disk('local')->put('mathematicalModel/'.$name, \File::get($file));
            $saved = true;
        }catch(\Exception $error){
            //dd($error);
        }
       return $saved;
    }

    private function savedFileRemoto($name){
        $saved = false;
        try{
            $url = public_path().'/storage/mathematicalModel/'.$name;
            \SSH::into('production')->put($url, env('KINECT_PATH_MODELS').$name);
            $saved = true;
        }catch(\Exception $error){

        }
        return $saved;
    }
   
    private function deletedFileRemoto($fileName){
        \SSH::into('production')->run([
                'cd '.env('KINECT_PATH_MODELS'),
                'rm '.$fileName
            ]);
    }
    */

    /**
    * Verify exists folder
    *
    
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
    
    private function createFolder($name){
        $response = \File::makeDirectory(storage_path().'/app/'.$name, 0775, true);
        return $response;
    }
    */
    
}
