<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
  
    public function index()
    {
        $services = Service::all();
      return view ('service.index')->with('service', $services);
    }

    
    public function create()
    {
        return view('service.create');
    }

   
    public function store(Request $request)
    {
        $input = $request->all();
        Service::create($input);
        return redirect('service')->with('flash_message', 'Service Addedd!');  
    }

    
    public function show($id)
    {
        $service = Service::find($id);
        return view('service.show')->with('service', $service);
    }

    
    public function edit($id)
    {
        $service = Service::find($id);
        return view('service.edit')->with('service', $service);
    }

  
    public function update(Request $request, $id)
    {
        $service = Cervice::find($id);
        $input = $request->all();
        $service->update($input);
        return redirect('service')->with('flash_message', 'Service Updated!');  
    }

   
    public function destroy($id)
    {
        Service::destroy($id);
        return redirect('service')->with('flash_message', 'Service deleted!');  
    }
}