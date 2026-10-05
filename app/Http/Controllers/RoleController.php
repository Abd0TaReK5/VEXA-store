<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

        $permissions = Permission::with('roles')->paginate(12);
        // $names = $users->name;
        $roles = Role::with('permissions')->get();
        // $permission = Permission::all();
      
        
        return view('themes.default.back.dashboard.permission.role',
        compact('roles','permissions'));
        
   
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showpermissions()
{
    
}

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'role_name' => 'required|string|max:255',
            
        ]);

        $role = Role::create([
            'name' => $request->role_name,
            'guard_name' => 'web'
        ]);

        event(new Registered($role));
   

        // Auth::login($role);

        return response()->json([
        'success' => true,
        'message' => 'Role created successfully!'
        ]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Role = Role::findOrFail($id);

    return response()->json(
        $Role->permissions->pluck('id')
    );    

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request):JsonResponse
{
    $request->validate([
        'id'      => 'required|exists:users,id',
        'role_id' => 'required|exists:roles,id',
    ]);

    $user = User::findOrFail($request->id);
    $user->role()->associate($request->role_id);
    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'Role Updated!',
    ]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $permission)
    {
        //
    }
}
