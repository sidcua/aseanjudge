<?php

namespace App\Http\Controllers;
use App\Song;
use App\Dance;
use App\Infographic;
use App\View;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function loadSongs(){
        $score = [];
        $songs = Song::selectRaw('(SUM(content)/COUNT(*) + SUM(melody)/COUNT(*) + SUM(accompaniment)/COUNT(*) + SUM(interpretation)/COUNT(*) + SUM(harmony)/COUNT(*)) as total, performer, COUNT(*) as judges')
                        ->groupBy('performer')
                        ->orderBy('total', 'DESC')
                        ->get();
        foreach ($songs as $song){
            $tmp = [];
            $tmp['performer'] = $song->performer;
            $tmp['score'] = $song->total;
            $tmp['score'] = round($tmp['score'], 2);
            $tmp['judges'] = $song->judges;
            $judges = Song::selectRaw('judge, performer, (content + melody + accompaniment + interpretation + harmony) as total')
                            ->where('performer', '=', $song->performer)
                            ->get();
            foreach ($judges as $judge) {
                $tmp['judge'][$judge->judge] = round($judge->total, 2);
            }
            array_push($score, $tmp);
        }
        return response()->json($score);
    }

    public function loadDances(){
        $score = [];
        $dances = Dance::selectRaw('(SUM(choreography)/COUNT(*) + SUM(execution)/COUNT(*) + SUM(aesthetic)/COUNT(*) + SUM(costume)/COUNT(*)) as total, performer, COUNT(*) as judges')
                        ->groupBy('performer')
                        ->orderBy('total', 'DESC')
                        ->get();
        foreach($dances as $dance){
            $tmp = [];
            $tmp['performer'] = $dance->performer;
            $tmp['score'] = $dance->total;
            $tmp['score'] = round($tmp['score'], 2);
            $tmp['judges'] = $dance->judges;
            $judges = Dance::selectRaw('judge, performer, (choreography + execution + aesthetic + costume) as total')
                        ->where('performer', '=', $dance->performer)
                        ->get();
            foreach ($judges as $judge) {
                $tmp['judge'][$judge->judge] = round($judge->total, 2);
            }
            array_push($score, $tmp);
        }
        return response()->json($score);
    }
    
    public function loadInfoGraphics(){
        $score = [];
        $infographic = Infographic::selectRaw('(SUM(editing)/COUNT(*) + SUM(cinematography)/COUNT(*) + SUM(creativity)/COUNT(*) + SUM(artistic)/COUNT(*)) as total, performer, COUNT(*) as judges')
                        ->groupBy('performer')
                        ->orderBy('total', 'DESC')
                        ->get();
        foreach ($infographic as $ig) {
            $tmp = [];
            $tmp['performer'] = $ig->performer;
            $tmp['score'] = $ig->total;
            $tmp['score'] = round($tmp['score'], 2);
            $tmp['judges'] = $ig['judges'];
            $judges = Infographic::selectRaw('judge, performer, (editing + cinematography + creativity + artistic) as total')
                        ->where('performer', '=', $ig->performer)
                        ->get();
            foreach ($judges as $judge) {
                $tmp['judge'][$judge->judge] = round($judge->total, 2);
            }
            array_push($score, $tmp); 
        }
        return response()->json($score);
    }

    public function toggleView(Request $request) {
        $view = View::find(1);
        if ($request->view == 'a') {
            $tmp = 1;
        } else {
            $tmp = 0;
        }
        $view->view = $tmp;
        $view->save();
        return response()->json($view);
    }

    public function getView() {
        $view = View::find(1);
        return response()->json($view->view);
    }
}
