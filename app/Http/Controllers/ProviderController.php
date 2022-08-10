<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $provider = User::all();
      return view ('provider.index')->with('provider', $provider);
    }
    public function create()
    {
        return view('provider.create',['role'=>Role::all()]);
    }



    public function store(Request $request)
    {
        $input = $request->all();
        User::create($input);
        return redirect('provider')->with('flash_message', 'Provider Addedd!');
    }


    public function show($id)
    {
        $provider = User::find($id);
        return view('provider.show')->with('provider', $provider);
    }


    public function edit($id)
    {
        $provider = User::find($id);
        return view('provider.edit')->with('provider', $provider);
    }


    public function update(Request $request, $id)
    {
        $provider = User::find($id);
        $input = $request->all();
        $provider->update($input);
        return redirect('provider')->with('flash_message', 'Provider Updated!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('provider')->with('flash_message', 'Provider deleted!');
    }
}
