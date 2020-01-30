<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function show()
    {
        return view('profile');
    }

    public function changepicture(Request $request, $id)
    {
        $user=User::find($id);

        if ($request->hasFile('picture')){
            $user->picture=$request->picture->store('public/pictures');
        }
        $user->save();
        return redirect()->route('profile');
    }

    public function changeinfo(Request $request, $id)
    {
        $user=User::find($id);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        return redirect()->route('profile');
    }

    public function passwordpage( $id)
    {
        
        return view('changepassword',compact('id'));
    }


    public function changepass(Request $request, $id)
    {
        $user=User::find($id);

        $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->route('profile');
    }


    public function destroy($id)
    {
        //
    }
}
