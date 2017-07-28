<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{


    
    /**
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        return response($user, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response($user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'bail|required|string|max:255',
            'lastname' => 'required|string|',
            'dept_id' => 'required|integer',
            'category_id' => 'required|integer',
            'due_date' => 'required|date|after_or_equal:today',
            'end_repeat_date' => 'nullable|date|after_or_equal:tomorrow',
            'reminder' => 'nullable|date|after_or_equal:today',
        ]);
        //if email is changed deactivate account and send new activation to new email
        $user = User::find($id);
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->active = $request->input('active');
        $user->department_id = $request->input('dept_id');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');//only admin can change this
        $user->vacation = $request->input('vacation');
        $user->phone = $request->input('phone');
        $user->signature = $request->input('signature');
        $user->updated_at = date("Y-m-d H:i:s", time());
        $user->save();
        return response()->json(['message' => 'Task Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

}
