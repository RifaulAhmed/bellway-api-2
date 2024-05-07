<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\User;
Use App\Models\Product;

use Illuminate\Support\Facades\Validator;
use Exception;
use Auth;

class UserController extends Controller
{
    public function createUser(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=> "required|string",
            'phone'=> "required|numeric|digits:10|unique:users",
            'email'=> "required|unique:users",
            'password'=> "required|min:8",
            // 'password_confirmation' => 'required|same:password'
            
            

        ]);
        if($validator->fails()){
            $result=array('status'=>false, 'message'=>"Validation Error Occured",'error_message'=>$validator->errors ());
            return response()->json($result,400); //bad request
            
        }

        $user = User::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            
        ]);

        if($user->id){
            $result=array('status'=>true, 'message'=>"Successfully User Created", 'data'=>$user);
            $responseCode=200;
        }
        else{
            $result=array('status'=>false, 'message'=>"Something went wrong" );
            $responseCode=400;
        }

        return response()->json($result,$responseCode);
    }

    
    public function getUsers(){

        try{
                $users = User::all();
                $result=array('status'=>true, 'message'=>count($users)."user(s) fetched", 'data'=>($users));
                $responseCode=200;
                return response()->json($result,$responseCode);
        }catch(Exception $e){
            $result=array('status'=>false, 'message'=>"Api failed due to an error",'error_message'=>$e->getMessage());
            return response()->json($result,500);
            
            }
        }
        

      

           public function getUserDetail($id){
        // dd($id);
            $user = User::find($id);
               
                if(!$user){
                    $result=array('status'=>false, 'message'=>"user not found");
                    $responseCode=400;
                    return response()->json($result,$responseCode);
                }
                $result=array('status'=>true, 'message'=>"user found", 'data'=>($user));
                $responseCode=200;
                return response()->json($result,$responseCode);
            
           }
        
           
        
            public function updateUser(Request $request,$id){
        
                $user = User::find($id);
                if(!$user){
                    return response()->json(['status'=>false, 'message'=>"user not found"],404);
                }
        
                $validator = Validator::make($request->all(),[
                    'name'=> "required|string",
                    'phone'=> "required|numeric|digits:10",
                    'email'=> "required|string|unique:users,email,".$id,
                    // 'email'=> "required",
        
                ]);
                if($validator->fails()){
                    $result=array('status'=>false, 'message'=>"Validation Error Occured",'error_message'=>$validator->errors ());
                    return response()->json($result,400); //bad request
                    
                }
                
             $user->name = $request->name;
             $user->phone = $request->phone;
             $user->email = $request->email;
             $user->save();
        
             $result=array('status'=>true, 'message'=>"user data updated successfully", 'data'=>($user));
        
                return response()->json($result,200);
            }
        
        //delete user
        
            public function deleteUser($id){
        
                $user = User::find($id);
                if(!$user){
                    return response()->json(['status'=>false, 'message'=>"user not found"],404);
                }
        
              else{
             $user->delete();
        
             $result=array('status'=>true, 'message'=>"user has been deleted successfully");
              }
                return response()->json($result,200);
            }
        
            //User-Login
        
            public function userLogin(Request $request){
                $validator = Validator::make($request->all(),[
 
                    // 'phone'=> "required|numeric|digits:10|",
                    'email'=>"required|string",
                    'password'=>"required"
        
                ]);


                if($validator->fails()){
                    $result=array('status'=>false, 'message'=>"Validation Error Occured",'error_message'=>$validator->errors ());
                    return response()->json($result,400); //bad request   
                }
        
                $credentials = $request->only("email","password");
        
                if(Auth::attempt($credentials)){
                    $user = Auth::user();
        
                    // generating token
                    $token = $user->createToken('MyProject')->accessToken;
        
                    return response()->json(['status'=>true, 'message'=>"user login successfully!!", 'token'=>$token],200);
                }
                return response()->json(['status'=>false, 'message'=>"user credentials do not match!! Try again..."],401);
        
            }
        
            //Unauthenticate function
            
            public function unauthenticate(){
                return response()->json(['status'=>false, 'message'=>"Only authorized users can access!!",'error'=>"unauthenticated"],401);
            }
        
            //logout 
        
            public function userLogout(){
                $user= Auth::user();
                // $user->$tokens->each(function ($token , $key){
                // $tokens->delete();
                // });
                // $user= Auth::guard('api')->user();
                return response()->json(['status'=>true, 'message'=>"Logout Successfully!!", 'data'=>$user],200);
            }
}
