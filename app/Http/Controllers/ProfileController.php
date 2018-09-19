<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request, $id){

        $this->validate($request, [
            'name' => 'required',
//            'email' => 'sometimes|required|email|unique:users',
//            'password' => 'sometimes|required'
        ]);
        $customer = User::find($id);
//        $request->all();
        $customer->name = $request->input('name');

        if($request->input('password') == '')
        {
            $customer->password = Auth::user()->password;
        }
        else{
            $customer->password = $request->input('password');

        }
//        $request = $this->saveFiles($request);

        $customer->photo = $request->input('photo');
        $customer->address = $request->input('address');
        $customer->phone = $request->input('phone');
        $customer->bank_account_number = $request->input('bank_account_number');
        $customer->gender = $request->input('gender');

//        $customer->password = $request->input('password');

//        $customer->name = request('name');
////        $customer->email = request('email');
//        $customer->password = bcrypt(request('password'));

        $customer->save();

        return redirect('welcome')->with('success', 'Profile Updated');
    }
}
