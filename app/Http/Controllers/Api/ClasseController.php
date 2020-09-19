<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Classe;
use App\User;
use DB;
class ClasseController extends Controller
{

	public function classes(Request $req){


       $classes = DB::table('users')
            ->join('classes','classes.user_id', '=', 'users.id')
            ->where('classes.user_id','=',Auth::user()->id)
            ->get();
           
            return response()->json([                        
                        'success'=> true,
                        'classes' => $classes
             ]);

	
/*
   	$classes=Classe::find(Auth::user()->id)
   	->orderBy('id','desc')
   	->get();

      foreach ($classes as $classe) {
         $classe->user;       
         
      }
      return response()->json([
            
            'success'=> true,
            'classes' => $classes,
            
           
            
        ]);*/
   	
   	
   }

   public function create(Request $req){

   	$classe=new Classe();
   	$classe->user_id=Auth::user()->id;
   	$classe->filier=$req->filier;
   	$classe->desc=$req->desc;
   	$classe->save();

   	return response()->json([
            
            'success'=> true,
            'classe' => $classe
            
        ]);
   }
  




}
