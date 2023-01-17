<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index (){
        return Inertia::render('Dashboard',[
        "data"=>User::select("id",'first_name','last_name','email','type')->get()
        ]);
    }
}
