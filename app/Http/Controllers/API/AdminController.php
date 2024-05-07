<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Product;

use Illuminate\Support\Facades\Validator;
use Exception;
use Auth;

class AdminController extends Controller
{
    public function index(){
        return view('Dashboard.index');
        }


        //Login
        public function registerUser(){
            
            return view('registerUser');
        }

        public function registerCreate(Request $request){
            
            
            $users = new User();
            $users->name=$request->input('name');
           
            $users->phone=$request->input('phone');
            $users->email=$request->input('email');
            $users->password=bcrypt($request->input('password'));
            $users->type="Customer";
           
        //    if( $users->save()){
        //     return redirect('/loginUser')->back()->with('success','You are registered successfully');
        //    };
    

            return view('registerCreate');
        }

        public function loginUser(Request $request){

            $users = User::where('email',$request->input('email'))->where('password',$request->input('password'))->first();
            // if($users){
            //     session()->put('id',$users->id);
            //     session()->put('type',$users->type);
            //     if($users->type=='Customer'){
            //         return redirect('/');
            //     }

            // }else{
            //     return redirect('/loginUser')->back()->with('error','Invalid Details');
            // }
            
            return view('loginUser');
        }

        public function logoutUser(){
            session()->forget('id');
            session()->forget('type');
            return redirect('/loginUser');
        }

        //Customer Functions   

        public function customerOrders(){
            return view('Dashboard.orders');
            }

public function changeCustomerStatus($status, $id){
    $customers=User::find($id);
    $customers->status=$status;

    $customers->save();
    
    return redirect()->back()->with('success','User status changed successfully!!');
}



            public function getUsers(){

             
                        $customers = User::all();
                        return view('Dashboard.customers',compact('customers'));

                    //     try{
                    //         $customers =User::all();
                    //         $result=array('status'=>true, 'message'=>count($customers)."user(s) fetched", 'data'=>($customers));
                    //         $responseCode=200;
                    //         return response()->json($result,$responseCode);
                    // }catch(Exception $e){
                    //     $result=array('status'=>false, 'message'=>"Api failed due to an error",'error_message'=>$e->getMessage());
                    //     return response()->json($result,500);
                        
                    //     }
                       
                }

                //Vendor function

                public function vendorDetails(){

                    $vendors = Vendor::all();
                    return view('Dashboard.vendors',compact('vendors'));
                    }

                public function getVendors(){

             
                    $vendors = Vendor::all();
                    return view('Dashboard.vendors',compact('vendors'));
                   



                //     try{
                //         $vendors = Vendor::all();
                //         $result=array('status'=>true, 'message'=>count($vendors)."user(s) fetched", 'data'=>($vendors));
                //         $responseCode=200;
                //         return response()->json($result,$responseCode);
                // }catch(Exception $e){
                //     $result=array('status'=>false, 'message'=>"Api failed due to an error",'error_message'=>$e->getMessage());
                //     return response()->json($result,500);
                    
                //     }
                     
        
                }

                public function changeVendorStatus($status, $id){
                    $vendors=Vendor::find($id);
                    $vendors->status=$status;
                
                    $vendors->save();
                    
                    return redirect()->back()->with('success','User status changed successfully!!');
                }


                // Products managing Functions


                public function adminProducts(){

                    $products=Product::all();
                    return view('Dashboard.products',compact('products'));
                    }

                public function getProducts(){

             
                    $products = Product::all();
                    return view('Dashboard.products',compact('products'));

                //     try{
                //         $products = Product::all();
                //         $result=array('status'=>true, 'message'=>count($products)."user(s) fetched", 'data'=>($products));
                //         $responseCode=200;
                //         return response()->json($result,$responseCode);
                // }catch(Exception $e){
                //     $result=array('status'=>false, 'message'=>"Api failed due to an error",'error_message'=>$e->getMessage());
                //     return response()->json($result,500);
                    
                //     }
                   
        
                }


                

                public function addNewProduct(Request $request){

            

         
                    $products = new Product();
                    $products->dish=$request->input('dish');
                   
                    $products->price=$request->input('price');
                    $products->quantity=$request->input('quantity');
                    $products->category=$request->input('category');
                    if ($request->hasFile('file')) {
                        $products->image = $request->file('file')->getClientOriginalName(); // Corrected method name
                        $request->file('file')->move('uploads/products/', $products->image);
                    }
                    $products->save();
                    
                    return redirect()->back()->with('sucsess','Your new item added successfully');
                

                    return view('Dashboard.products',compact('products'));
              
                
                }


            

              

             
  
                public function updateProduct(Request $request){

             
                    $products = Product::find($request->input('id'));

                    $validator = Validator::make($request->all(),[
                        'dish'=> "required|string",
                        'price'=> "required",
                        'quantity'=> "required", 
                        'category'=>"required"                       
            
                    ]);
                   

                    $products->dish=$request->input('dish');     
                    $products->price=$request->input('price');
                    $products->quantity=$request->input('quantity');
                    $products->category=$request->input('category');
                    if ($request->file('file')!=null) {
                        $products->image = $request->file('file')->getClientOriginalName(); // Corrected method name
                        $request->file('file')->move('uploads/products/', $products->image);
                    }
                    $products->save();
                    return redirect()->back()->with('sucsess','Your item is updated successfully');


                    return view('Dashboard.products',compact('products'));
                   
        
                }


                public function deleteProduct($id){

                    $products=Product::find($id);
                    $products->delete();
                    
                    return redirect()->back()->with('success','Item deleted successfully!!');


                //     $products = Product::find($id);
                //     if(!$products){
                //         return response()->json(['status'=>false, 'message'=>"product  not found"],404);
                //     }
            
                //   else{
                //  $products->delete();
            
                //  $result=array('status'=>true, 'message'=>"Your product has been deleted successfully");
                //   }
                //     return response()->json($result,200);
                //     }
}
}