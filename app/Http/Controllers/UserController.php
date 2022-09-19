<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
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

        $user = User::where('id','!=',auth()->user()->id)->orderBy('id', 'DESC')->get();

        return view('admin/user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'fname' => 'required|min:1|max:255',
                'lname' => 'required|min:1|max:255',
                'email' => 'required|email|unique:users,email|max:255',
                'phone' => 'required|unique:users,phone|max:255',
                'role' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:10248',
                'password' => 'required|min:8|max:32'
            ]
        );
        $user = new User;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $user->image = $filename;
        }
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('admin/user')->with('success', 'New User has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'fname' => 'required|min:1|max:255',
                'lname' => 'required|min:1|max:255',
                'role' => 'required',
                'status' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:10248'
            ]
        );
        $user = User::find($id);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $user->image = $filename;
        }
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->status = $request->status;
        $user->role = $request->role;
        $user->update();
        return redirect('admin/user')->with('success', 'User has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
