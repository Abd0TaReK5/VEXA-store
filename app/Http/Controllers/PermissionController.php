<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

        $users = User::with('role')->paginate(12);
        // $names = $users->name;
        $roles = Role::with('users')->get();
        // $permission = Permission::all();
        
        
        return view('themes.default.back.dashboard.permission.user_managment',
        compact('roles','users'));
     
   
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showpermissions()
{
    
}

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return response()->json([
        'success' => true,
        'message' => 'User created successfully!'
        ]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

    return response()->json(
        $user->permissions->pluck('id')
    );    

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request): JsonResponse
{
    $data = $request->validate([
        'id'            => 'required|exists:roles,id',
        'permissions'   => 'nullable|array',
        'permissions.*' => 'integer|exists:permissions,id',
    ]);

    $role = Role::findOrFail($data['id']);

    $role->permissions()->sync($data['permissions'] ?? []);

    return response()->json([
        'success' => true,
        'message' => 'Permissions Updated!',
    ]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
