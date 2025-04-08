<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        $user = Auth()->user();
        if($user){
            return view('admin.index');
        }
        else{
            return redirect()->back();
        }
    }

    public function create() {
        return view('admin.uploadCV');
    }
}
