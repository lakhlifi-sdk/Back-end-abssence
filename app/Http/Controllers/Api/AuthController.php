<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Tyom\JWTAuth\Facades\JWTAuth;
use DB;


class AuthController extends Controller
{
    public function login(Request $request) {
        // get email and password from request
        $credentials = $request->only(['email', 'password']);
        
        // try to auth and get the token using api authentication
        if (!$token = auth()->attempt($credentials)) {
            // if the credentials are wrong we send an unauthorized error in json format
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            
            'success'=> true,
            'token' => $token,
            'type' => 'bearer',
             'user' => Auth::user(),// you can ommit this
            'expires' => auth('api')->factory()->getTTL() * 60 // time to expiration
            
            
        ]);
    }

    public function register(Request $request){

        $CryptPass=Hash::make($request->password);
        $user= new User;
        try{
            $user->name=$request->name;
            /*if($request->photo!=''){
            $photo=time().'.jpg';
            file_put_contents('storage/photo/'.$photo,base64_decode($request->photo));
            $user->photo=$photo;
             }*/
             $photo='1600116821.jpg';
             $user->photo=$photo;

            $user->role=$request->role;
            //$user->lastname=$request->lastname;
            $user->email=$request->email;
            $user->password=$CryptPass;
            $user->save();
            return $this->login($request);

        }catch(Exception $e){
            return response()->json([
            'success'=>false,
            'error'=>$e
           ]);
        }
    }

    public function logout(Request $request){
        try{
            JWTAuth::Invalidate(JWTAuth::parseToken($request->token));
            return response()->json(
            [
            'success'=>true,
            'message'=>'logout success',
            ]
            );
        }catch(Exception $e){
        return response()->json(
            [
            'success'=>False,
            'message'=>'logout faild',
            ]
            );
        }
    }

    public function getAllUsers(){
        $users = DB::table('users')
                    ->where('role',  'etudiant')
                    ->orderBy('id','desc')
                    ->get();
    /* $users=User::orderBy('id','desc')->get();*/
        return response()->json(
        [
            'success'=>true,
            'user'=>$users,

        ]
        );
    }



    public function saveUserInfo(Request $request){
        $user=  User::find(Auth::user()->id);


        $user->name=$request->name;
        
        if($request->photo!=''){

        $photo=time().'.jpg';
        file_put_contents('storage/profiles/'.$photo,base64_decode($request->photo));
        $user->photo=$photo;
        }

        $user->role='prof';
       

        //$user->email=$request->email;
        //$user->password=$CryptPass;
        $user->update();
        return response()->json([
            'success'=>true,
            'photo'=>$user
            
           ]);

    }

}
