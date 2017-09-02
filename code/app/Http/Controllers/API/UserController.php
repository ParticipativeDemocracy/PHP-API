<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Role;

class UserController extends Controller
{
    protected $successStatus = 200;

    /**
    * passport login function
    */
    public function login() {
      if(Auth::attempt(['email' => request('email'),
                        'password' => request('password')])){
          $user = Auth::user();
          $success['token'] = $user->createToken('Government')->accessToken;
          return response()->json(['success' => $success], $this->successStatus);
        }else{
          return response()->json(['error' => 'Unauthorized'], 401);
      }
    }

    public function register(Request $request) {
      $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = new User();
        $regUser =$user->create($input);

        $regUser->attachRole(Role::fetchByName(Role::COMPANY_MEMBER));
        $success['token'] =  $regUser->createToken('Government')->accessToken;
        $success['name'] =  $regUser->name;

        return response()->json(['success'=>$success], $this->successStatus);
    }
}
