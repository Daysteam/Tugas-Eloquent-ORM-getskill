<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index() {
        $groups = Group::with('pengguna')->get();
        
        return view('group.index',compact('groups'));
    }
}
