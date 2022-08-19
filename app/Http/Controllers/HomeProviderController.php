<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::count();
        $service = Service::count();
        $subcategory = SubCategory::count();
        $users = User::where('role_as','user')->count();
        $admins = User::where('role_as','admin')->count();
        $provider = User::where('role_as','provider')->count();
        $handyman = User::where('role_as','handyman')->count();


         return view('homeprovider', compact('category','service','subcategory','users','admins','provider','handyman'));

    }
}
