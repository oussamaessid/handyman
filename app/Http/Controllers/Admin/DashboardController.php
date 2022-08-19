<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $category = Category::count();
        $service = Service::count();
        $users = User::where('role_as','user')->count();
        $admins = User::where('role_as','admin')->count();
         return view('admin.dashboard', compact('category','service','users','admins'));
    }
}
