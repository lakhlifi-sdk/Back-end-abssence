<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Etudiant;
use App\User;
use App\Seance;
use Auth;

class SeanceController extends Controller
{
    
    public function index(Request $req){
        $id=$req->classe_id;
        $seances = DB::table('classes')
            ->join('seances','classes.id', '=', 'seances.classe_id')
            ->where('classes.id','=',$id)
            ->get();
           
            return response()->json([                        
                        'success'=> true,
                        'seances' => $seances
             ]);
                
    }
    	

    public function create(Request $req){
        $id=$req->classe_id;
    	$seance=new Seance();
    	$seance->user_id=Auth::user()->id;
    	$seance->title=$req->titre;
    	$seance->classe_id=$id;
    	$seance->start_at=$req->start;
    	$seance->end_at=$req->end;
    	$seance->save();

        $seances = DB::table('classes')
            ->join('seances','classes.id', '=', 'seances.classe_id')
            ->where('classes.id','=',$id)
            ->get();
           
            return response()->json([                        
                        'success'=> true,
                        'seances' => $seances
             ]);
    	
    }

}














/*$etudiants = DB::table('users')->join('etudiants', function ($join) {
            $join->on('users.id', '=', 'etudiants.user_id');
        })->get();
        return view('seances.index',['etudiants'=>$etudiants]);*/