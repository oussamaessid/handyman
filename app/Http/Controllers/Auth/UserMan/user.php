<?php

namespace App\Http\Controllers\Auth\UserMan;

use App\Http\Controllers\Controller;
use App\Models\users\users;
use Illuminate\Http\Request;

class user extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = users::all();
        return view ('user.index')->with('user', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        users::create($input);
        return redirect('user')->with('flash_message', 'user Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users\users  $userMan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $User = users::find($id);
        return view('user.show')->with('user', $User);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users\users  $userMan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $User = users::find($id);
        return view('user.edit')->with('user', $User);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users\users  $userMan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User = users::find($id);
        $input = $request->all();
        $User->update($input);
        return redirect('user')->with('flash_message', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users\users  $userMan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::destroy($id);
        return redirect('user')->with('flash_message', 'User deleted!');
    }
}
