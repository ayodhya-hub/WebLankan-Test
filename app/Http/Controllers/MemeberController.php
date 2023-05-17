<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemeberController extends Controller
{
    //get members list
    public function getMembers(){
        $members = Member::paginate(3);
        return view('members',['members'=>$members]);
    }

    //get edit view
    function edit($id)
    {
        $data= Member::find($id);
        return view('member',['data'=>$data]);
    }

    //member updating process
    function postEdit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $data= Member::find($request->id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->address=$request->address;
        $data->save();
        return redirect("get-members");

    }

    //get insert view
    public function insert()
    {
        $data= null;
        return view('member',['data'=>$data]);
    } 

    //member insertion process
    public function postInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'address' => 'required',
        ]);

        $data= new Member;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->address=$request->address;
        $data->save();
        return redirect("get-members");
    }
}
