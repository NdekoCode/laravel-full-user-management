<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('vip-access')) {
            return redirect()->route('admin.users.show', Auth()->user()->id)->with('warning', "Vous n'etes pas autoriser à effectuer cette action");
        }
        $users = User::latest()->paginate(9);
        return view('pages.admin.users.index', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (!Gate::allows('edit-user', $user)) {
            return redirect()->route('admin.users.index')->with('warning', "Vous n'etes pas autoriser à effectuer cette action");
        }
        $roles = Role::where('name', '!=', 'super_admin')->get();
        return view('pages.admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (!Gate::allows('edit-user', $user)) {
            return redirect()->route('admin.users.index')->with('warning', "Vous n'etes pas autoriser à effectuer cette action");
        }
        $userData = $request->validate([
            'firstname' => 'required|string|min:2|max:50',
            'lastname' => 'required|string|min:2|max:50',
            'email' => 'email|required',
            'roles' => 'exists:roles,id'
        ]);

        // dd($user->roles()->where('role_id', $request->roles)->exists());
        $userEmail = User::where('email', $request->email)->first();
        $roleUser = [];

        $roles = Role::find($request->roles);
        if (!Gate::allows('superAdmin-access')) {

            foreach ($roles as $role) {
                if ($role->name === 'super_admin') {
                    continue;
                }
                $roleUser[] = $role->id;
            }
        } else {
            $roleUser = $roles->pluck('id')->toArray();
        }
        if (empty($userEmail->email) || $user->email === $userEmail->email) {
            $user->update($userData);
            $user->roles()->sync($roleUser);

            // if ($user->roles()->where('role_id', $request->roles)->exists())
            return redirect()->route('dashboard')->with('success', "Utilisateur modifier avec succés");
        }
        return back()->with('error', 'Email déjà pris');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!Gate::allows('is-priority', $user)) {

            return redirect()->route('admin.users.index')->with('warning', "Vous n'etes pas autoriser à effectuer cette action");
        }

        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', "Utilisateur supprimer");
    }
}
