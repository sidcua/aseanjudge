<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Dance;
use App\Infographic;
use App\Song;
use Validator;
use Session;

class CriteriaController extends Controller
{
    public function submitSong(Request $request){
        $validator = Validator::make($request->all(), [
            'performer' => 'required|numeric',
            'content' => 'required|numeric|min:1|max:20',
            'melody' => 'required|numeric|min:1|max:20',
            'accompaniment' => 'required|numeric|min:1|max:20',
            'interpretation' => 'required|numeric|min:1|max:20',
            'harmony' => 'required|numeric|min:1|max:20',
        ]);
        $response = array(
            'status' => 0,
            'error' => array(),
        );
        if($validator->fails()){
            $response['status'] = 1;
            $response['errors'] = $validator->errors();
        } else {
            $song = Song::where([
                                ['performer', $request->performer],
                                ['judge', session()->get('judge')],
                        ])
                        ->count();   
            if ($song) {
                Song::where([
                    ['performer', $request->performer],
                    ['judge', session()->get('judge')],
                ])->update($request->except('_token'));
            } else {
                $song = new Song;
                $song->fill($request->all());
                $song->judge = session()->get('judge');
                $song->save();
            }
        }
        return response()->json($response);
    }

    public function submitDance(Request $request){
        $validator = Validator::make($request->all(), [
            'performer' => 'required|numeric',
            'choreography' => 'required|numeric|min:1|max:30',
            'execution' => 'required|numeric|min:1|max:30',
            'aesthetic' => 'required|numeric|min:1|max:20',
            'costume' => 'required|numeric|min:1|max:20',
        ]);
        $response = array(
            'status' => 0,
            'error' => array(),
        );
        if($validator->fails()){
            $response['status'] = 1;
            $response['errors'] = $validator->errors();
        } else {
            $dance = Dance::where([
                ['performer', $request->performer],
                ['judge', session()->get('judge')],
                    ])
                    ->count();   
            if ($dance) {
                Dance::where([
                    ['performer', $request->performer],
                    ['judge', session()->get('judge')],
                ])->update($request->except('_token'));
            } else {
                $dance = new Dance;
                $dance->fill($request->all());
                $dance->judge = session()->get('judge');
                $dance->save();
            }
        }
        return response()->json($response);
    }

    public function submitInfoGraphic(Request $request){
        $validator = Validator::make($request->all(), [
            'performer' => 'required|numeric',
            'editing' => 'required|numeric|min:1|max:25',
            'cinematography' => 'required|numeric|min:1|max:25',
            'creativity' => 'required|numeric|min:1|max:25',
            'artistic' => 'required|numeric|min:1|max:25',
        ]);
        $response = array(
            'status' => 0,
            'error' => array(),
        );
        if($validator->fails()){
            $response['status'] = 1;
            $response['errors'] = $validator->errors();
        } else {
            $infographic = Infographic::where([
                ['performer', $request->performer],
                ['judge', session()->get('judge')],
                    ])
                    ->count();   
            if ($infographic) {
                Infographic::where([
                    ['performer', $request->performer],
                    ['judge', session()->get('judge')],
                ])->update($request->except('_token'));
            } else {
                $infographic = new Infographic;
                $infographic->fill($request->all());
                $infographic->judge = session()->get('judge');
                $infographic->save();
            }
        }
        return response()->json($response);
    }
}
