<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Etudiant;
use DB;


class EtudiantController extends Controller
{
   //stor

	public function create(Request $req){
		$etudiant=new Etudiant();
		$etudiant->user_id=$req->user_id;
		$etudiant->cne=$req->cne;
		$etudiant->classe_id=$req->classe_id;
		$etudiant->save();
		return response()->json([

			"success"=>true,
			"etudiant"=>$etudiant

		]);
	}


	public function etudiants(){
		$etudiants = DB::table('users')
            ->join('etudiants','users.id', '=', 'etudiants.user_id')
            ->get();
           
            return response()->json([                        
                        'success'=> true,
                        'etudiants' => $etudiants
             ]);
	}
}
