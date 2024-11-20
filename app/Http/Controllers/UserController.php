<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::All();
        return response()->json(['message' => 'login successfuly','code' =>'200', 'users' => $users]);
    }

    public function login(Request $request){
        $loginDetails = $request->only('email','password');
        $user = User::where('email',$request->input('email'))->first();
        if(Auth::attempt($loginDetails)){
            $token = $user->createToken('my-app-token')->plainTextToken;
             return response()->json(['message' => 'login successfuly','code' =>'200','user'=>$user,'token'=>$token]);
         }else{
             return response()->json(['message' => 'login details wrong','code'=>'err']);
         }
         $request->session()->put('keyUser', $user);
        /*$credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!Auth::attempt($credentials)){
            throw ValidationException::WithMessages([
                'email' => [
                    __('auth.failed');
                ]
                ]);
        }

        $user = User::where('email',$request->input('email'))->first();
       
        return response()->json(['message' => 'login successfuly','code' =>'200','user'=>$user]);*/
    }

    public function logout(){
        return Auth::logout();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $result = $user->save();
        if($result){
            return response()->json(['message'=>"User created"]);
        }else{
            return response()->json(['message'=>"User failed"]);

        }
    }

    public function message(Request $request){
        return response()->json(['message'=>"User created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        return $id?User::find($id):User::where('statut','=',1)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->email = $request->email;
        $user->name = $request->name;
        $result = $user->save();
        if($result){
            return response()->json(['message'=>"User updated"]);
        }else{
            return response()->json(['message'=>"User failed"]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->statut = 0;
        $result = $user->save();
        if($result){
            return response()->json(['message'=>"User deleted"]);
        }else{
            return response()->json(['message'=>"User failed"]);

        }
        
    }

    public function search($email){
      return User::where('email',"like","%".$email."%")->get();
    }
}
