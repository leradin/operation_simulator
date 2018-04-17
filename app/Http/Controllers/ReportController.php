<?php

namespace SimulatorOperation\Http\Controllers;

use Illuminate\Http\Request;
use SimulatorOperation\Exercise;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	$exercises = Exercise::where('number_of_times_played','>',0)->get();
        return view('report.index',['exercises' => $exercises]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function showMapComments($id){
    	$exercise = Exercise::find($id);
		$comments = callWsReport('/api/comments-map/'.$id);
        $comments = collect($comments['message'])->toArray();
		return view('report.map_comments',['exercise' => $exercise,'comments' => $comments]); 	
    }	

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function showVideoComments($id){
        $exercise = Exercise::find($id);
        $comments = callWsReport('/api/comments-video/'.$id);
        $comments = collect($comments['message'])->toArray();
        return view('report.video_comments',['exercise' => $exercise,'comments' => $comments]);   
    }   

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function showAudioVideo($id){
        $exercise = Exercise::find($id);
            $filesAudios = $this->getFilesFromFTP('audios/'.$id.'/');
            $filesVideos = $this->getFilesFromFTP('videos/'.$id.'/');
            $files['audios'] = $filesAudios;
            $files['videos'] = $filesVideos;
            $files = collect($files)->toArray();
            //dd($files);
        return view('report.audio_video',['exercise' => $exercise,'files' => $files]);   
    }

     public function download($path){
        $path = str_replace("*","/",$path);
        return response()->download($path);
    } 

    private function getFilesFromFTP($folder){
        //$data = [];
        //try{
            $data = Storage::disk('nas')->files(env('FTP_PATH_MULTIMEDIA').$folder, true);
            /*foreach($data as $key => $value){
                $data[$key]= array('url' => str_replace("/","*",$value),
                                    'data' => explode("/",$value)[3]
                                );
            }*/
            
        //}catch(\Exception $error){
            
        //}
        return $data;
    }    
}
