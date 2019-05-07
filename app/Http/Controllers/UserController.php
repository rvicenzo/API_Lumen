<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * User api methods.
     *
     * @param  Request  $request
     * @return Response
     */
    public function list(Request $request)
    {
        return User::all();
    }

    public function find(Request $request, $id)
    {
        return User::findOrFail($id);
    }

    public function create(Request $request)
    {
        $inputs = $request->all();
        return User::firstOrCreate($inputs);
    }

    public function update(Request $request, $id)
    {   
        $inputs = $request->all();
        $user = User::find($id);
                
        foreach($inputs as $key => $value) {
            $user[$key] = $inputs[$key];
        }
        
        $result = $user->save();
        return response()->json(['result' => $result]);
    }

    public function remove(Request $request, $id)
    {
        $result = User::destroy($id);
        return response()->json(['result' => $result ? true : false]);
    }
}