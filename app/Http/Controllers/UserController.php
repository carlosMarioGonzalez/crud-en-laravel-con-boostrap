<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\PosRquest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', [
            'users' => $users

        ]);
    }

    public function store(PosRquest $request)
    {


        User::create([

            'name' => $request->name,
            'surname' => $request->surname,
            'identification' => $request->identification,
            'email' => $request->email,
            'phone' => $request->phone,
            


        ]);
        return back();
    }

    public function edit(User $user){

        return view('users.editar', compact('user'));
    }

    public function update(Request $request, User $user){

        $request->validate([

            'name'=> 'required',
            'surname'=> 'required',
            'identification'=> 'required',
            'email'=> 'required',
            'phone'=> 'required'

        ]);
         if($request->gmail == $request->all('gmail')){
                 echo "error";
         }else{
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->identification = $request->identification;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();
         

        return redirect()->route('users.index', $user);
         }

    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }

    
}
