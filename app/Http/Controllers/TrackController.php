<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\Track;
use Illuminate\Http\Request;
use Lang;

class TrackController extends Controller
{
    private $menu = 'catalog/track';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks = Track::All();
        return view('catalogs.track.index',compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identities = getEnumValues('tracks','identity');
        $battleDimensions = getEnumValues('tracks','identity');
        $statuss = getEnumValues('tracks','status');
        return view('catalogs.track.create',['identities' => $identities,
                                            'battleDimensions' => $battleDimensions,
                                            'statuss' => $statuss]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Track::create($request->except('_token'));
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_track');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        $identities = getEnumValues('tracks','identity');
        $battleDimensions = getEnumValues('tracks','identity');
        $statuss = getEnumValues('tracks','status');
        return view('catalogs.track.edit',['track' => $track,
                                            'identities' => $identities,
                                            'battleDimensions' => $battleDimensions,
                                            'statuss' => $statuss]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        $track->fill($request->except(['_token']));
        $track->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_track');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        $track->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_track');
        return redirect($this->menu)->with('message',$message);
    }
}
