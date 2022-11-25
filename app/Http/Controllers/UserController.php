<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::all();
        return Inertia::render(
            'Accounts/Index',
        [
            'users' => $users
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render(
            'Accounts/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('accounts.index')->with('message', 'Account Created');
    }

    /**
     * Display the specified resource.
     * 
     *  @param \App\Models\User $user
     *  @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     *  Show the form for editing the specified resource.
     * 
     *  @param \App\Models\User $user
     *  @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return Inertia::render(
            'Accounts/Edit',
            [
                'user' => $user
            ]
        );
    }

    /**
     *  Update the specified resource in storage.
     * 
     *  @param \Illuminate\Http\Request $request
     *  @param \App\Models\User $user
     *  @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        sleep(1);

        return redirect()->route('accounts.index')->with('message', 'User Updated');
    }

    /**
     *  Remove the specified resource from storage.
     * 
     *  @param \App\Models\User $user
     *  @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
        $user->delete();
        // sleep(1);

        return redirect()->route('accounts.index')->with('message', 'User Deleted');
    }

    
    
}
