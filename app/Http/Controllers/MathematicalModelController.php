<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\MathematicalModel;
use SimulatorOperation\UnitType;
use Illuminate\Http\Request;
use SimulatorOperation\Http\Requests\MathematicalModelCreateRequest;
use SimulatorOperation\Http\Requests\MathematicalModelEditRequest;
use Lang;

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
        $unitTypes = UnitType::doesntHave('mathematicalModel')->get()->pluck('name','id');
        return view('catalogs.mathematicalModel.create',['unitTypes' => $unitTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MathematicalModelCreateRequest $request)
    {
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
        $unitTypes = UnitType::whereDoesntHave('mathematicalModel', function ($query) use ($mathematicalModel) {
            $query->where('id', '<>',$mathematicalModel->id);
        })->get()->pluck('name', 'id');
        return view('catalogs.mathematicalModel.edit',['mathematicalModel' => $mathematicalModel,'unitTypes' => $unitTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function update(MathematicalModelEditRequest $request, mathematicalModel $mathematicalModel)
    {
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
}
