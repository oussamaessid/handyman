<?php

namespace App\Http\Controllers;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $provider = Provider::all();
      return view ('provider.index')->with('provider', $provider);
    }

    
    public function create()
    {
        return view('provider.create');
    }

   
    public function store(Request $request)
    {
        $input = $request->all();
        Provider::create($input);
        return redirect('provider')->with('flash_message', 'Provider Addedd!');  
    }

    
    public function show($id)
    {
        $provider = Provider::find($id);
        return view('provider.show')->with('provider', $provider);
    }

    
    public function edit($id)
    {
        $provider = Provider::find($id);
        return view('provider.edit')->with('provider', $provider);
    }

  
    public function update(Request $request, $id)
    {
        $provider = Provider::find($id);
        $input = $request->all();
        $provider->update($input);
        return redirect('provider')->with('flash_message', 'Provider Updated!');  
    }

   
    public function destroy($id)
    {
        Provider::destroy($id);
        return redirect('provider')->with('flash_message', 'Provider deleted!');  
    }
}
