<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Seance;
use App\Absence;

class AbsenceController extends Controller
{
    public function store(Request $req){
    	//dd($req);
    	$absence=new Absence();
    	$absence->etudiant_id=$req->etudiant_id;
    	$absence->seance_id=$req->seance_id; 
		$absence->save();
     	return response()->json([
            'success'=> true,
            'absence'=>$absence,
            'user'=>$user ,
            'seance' => $seance 
        ]);
    }
}
