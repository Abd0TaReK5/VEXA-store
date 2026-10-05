@extends('themes.default.back.layout.master')
@section('content')

<section class="users-section">

    <div class="users-header">
        <h2>Role Management</h2>

        <button class="create-btn" onclick="openRolemodal()">
            + Create New Role
        </button>
    </div>

    <div class="users-grid">

        
    @foreach($roles as $role)
        @continue($role->name === 'root' && auth()->user()->name !== 'root')
            <div class="user-card">
                <div class="card-top">
                    <h4>{{$role->name}}</h4>
                    <span class="role-badge admin">Role</span>
                </div>

                <button class="permissions-btn" 
                    id="rolePermBtn-{{ $role->id }}"
                    data-permission-ids='@json($role->permissions->pluck("id"))'
                    onclick="editRoleModal({{ $role->id }})">
                    edit Role
                </button>
            </div>
    @endforeach 

    </div>



{{-- Start first pop up window --}}
<div class="modal-overlay" id="Creationmodal">
    <div class="modal-box">
    

       <button class="close-btn" onclick="confirmClose()">×</button>

        <!-- STEP 1 -->
        <div class="modal-step active" id="step1">

            <h3>Create New Role</h3>
            <form method="post" id="createUserForm" data-url="{{ route('role_create') }}">
                @csrf
                @method('put')
            <div class="form-group role-name-group">
                <label for="roleName">Role name</label>
                <input
                    type="text"
                    id="roleName"
                    name="role_name"
                    placeholder="e.g. Editor, Moderator..."
                    maxlength="50"
                    autocomplete="off"
                >
                <small class="field-error" id="roleNameError"></small>
            </div>
            <p class="modal-subtitle">Select permissions</p>

            @php
                use Illuminate\Support\Str;
                $grouped = $permissions->groupBy(fn ($p) => Str::afterLast($p->name, ' '));
            @endphp

            <div class="permissions-groups">
        @forelse($grouped as $section => $items)
            <div class="permission-group">
                <div class="group-title">{{ Str::singular($section) }}</div>
                <div class="group-items">
                    @foreach($items as $permission)
                        <label class="permission-card">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="permission-checkbox">
                            <span class="permission-name">{{ Str::beforeLast($permission->name, ' ') }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        @empty
            <p class="no-permissions">No permissions available.</p>
        @endforelse
        </div>

            <button type="submit" class="next-btn" id="submitBtn">
                <span class="btn-text" id="nextBtn">Create Role</span>
                <span class="spinner" style="display:none;">
                    <svg width="20" height="20" viewBox="0 0 50 50">
                        <circle cx="25" cy="25" r="20" stroke="#1f2937" stroke-width="5" fill="none" stroke-linecap="round">
                            <animateTransform attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="2s" repeatCount="indefinite"/>
                        </circle>
                    </svg>
                </span>
                </button>
                </form>

            
            </div>
        </div>
    </div>
{{-- End first pop up window --}}





            
<div id="permissionsModal" class="modal-overlay">
    <div class="modal-box">

        <button type="button" class="close-btn" onclick="closeEditRoleModal()">&times;</button>
        <h3>Select Permissions</h3>

        <form method="post" id="editRoleForm" data-url="{{ route('update_permission') }}">
            @csrf
            @method('put')
            <input type="hidden" name="id" id="selectedRoleId">

            <div class="permissions-groups">
                @forelse($grouped as $section => $items)
                    <div class="permission-group">
                        <div class="group-title">{{ \Illuminate\Support\Str::singular($section) }}</div>
                        <div class="group-items">
                            @foreach($items as $permission)
                                <label class="permission-card">
                                    <input type="checkbox"
                                           name="permissions[]"
                                           value="{{ $permission->id }}"
                                           class="permission-checkbox">
                                    <span class="permission-name">
                                        {{ \Illuminate\Support\Str::beforeLast($permission->name, ' ') }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p class="no-permissions">No permissions available.</p>
                @endforelse
            </div>

            <button type="submit" class="next-btn">
                <span class="btn-text">Update Permissions</span>
                <span class="spinner" style="display:none;">
                    <svg width="20" height="20" viewBox="0 0 50 50">
                        <circle cx="25" cy="25" r="20" stroke="#1f2937" stroke-width="5" fill="none" stroke-linecap="round">
                            <animateTransform attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="2s" repeatCount="indefinite"/>
                        </circle>
                    </svg>
                </span>
            </button>
        </form>

    </div>   {{-- يقفل .modal-box --}}
</div>        
</section>

{{-- End permissions window --}}
<!-- User Modal -->
<!-- Permissions Modal -->
<!-- Permissions Modal -->

{{-- End permissions window --}}






@endsection
