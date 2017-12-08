<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use File;
use Auth;
use Image;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("admin.users.index")->with("users", $users);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $role = Role::findOrFail($user);
        return view('admin.users.edit')->with('user', $user)
                ->with('role', $role);
    }

    public function update()
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.users.index');
    }

    public function profile()
    {
        return view('profile', array('user' => Auth::user()) );
    }


    public function update_avatar(Request $request)
    {
        $user = User::find(Auth::user()->id);
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
            if ($user->avatar !== 'default.jpg') {
                $path = '/uploads/avatars/';
                $lastpath= Auth::user()->Avatarpath;
                File::Delete(public_path( $path . $lastpath) );

            }
    		Image::make($avatar)->fit(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}
    	return view('profile', array('user' => Auth::user()) );
    }
}
