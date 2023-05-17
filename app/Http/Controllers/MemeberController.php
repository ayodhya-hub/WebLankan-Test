<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemeberController extends Controller
{
    public function getMembers(){
        $members = Member::paginate(3);
        return view('members',['members'=>$members]);
    }
}
