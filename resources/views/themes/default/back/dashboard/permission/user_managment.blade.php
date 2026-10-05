@extends('themes.default.back.layout.master')
@section('content')

<section class="users-section">

    <div class="users-header">
        <h2>User Management</h2>

        <button class="create-btn" onclick="openCreationmodal()">
            + Create New User
        </button>
    </div>

    <div class="users-grid">

        
    @foreach($users as $user)
            <div class="user-card">
                <div class="card-top">
                    <h4>{{$user->name}}</h4>
                    <span class="role-badge user">{{$user->role->name ?? 'No Role'}}</span>
                </div>

                <button type="button"
                    class="permissions-btn"
                    id="roleBtn-{{ $user->id }}"
                    data-role-id="{{ $user->role_id }}"
                    data-user-name="{{ $user->name }}"
                    onclick="openModal({{ $user->id }})">
                Select Role
</button>
            </div>
    @endforeach 
            
       

    </div>



{{-- Start first pop up window --}}
<div class="modal-overlay" id="Creationmodal">
    <div class="modal-box">
    

       <button class="close-btn" onclick="confirmClose()">X</button>

        <!-- STEP 1 -->
        <div class="modal-step active" id="step1">

            <h3>User Information</h3>
            <p class="modal-subtitle">Enter user details</p>

            <form method="post" id="createUserForm" data-url="{{ route('user_create') }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Enter user's name">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter user's email">
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="password" name="password" placeholder="Enter user's password">
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm user's password">
                </div>


                <button type="submit" class="next-btn" id="submitBtn">
                <span class="btn-text" id="nextBtn">Create User</span>
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

<div id="RolesChangeModal" class="modal-overlay">
    <div class="modal-box">

        <button type="button" class="close-btn" onclick="closeRolesModal()">&times;</button>
        <h3>Select Role for <span id="modalUserName"></span></h3>

        <form id="rolesForm" method="post" data-url="{{ route('role_change') }}">
            @csrf
            @method('put')

            <input type="hidden" name="id" id="selectedUserId">

            @foreach($roles as $role)
                <label class="permission-card">
                    <input type="radio"
                           name="role_id"
                           value="{{ $role->id }}"
                           class="permission-checkbox">
                    <span class="permission-name">{{ $role->name }}</span>
                </label>
            @endforeach

            <div class="modal-buttons">
                <button type="button" class="permissions-btn" onclick="closeRolesModal()">Cancel</button>
                
                <button type="submit" class="next-btn" id="submitBtn">
                <span class="btn-text" id="nextBtn">Save</span>
                <span class="spinner" style="display:none;">
                    <svg width="20" height="20" viewBox="0 0 50 50">
                        <circle cx="25" cy="25" r="20" stroke="#1f2937" stroke-width="5" fill="none" stroke-linecap="round">
                            <animateTransform attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="2s" repeatCount="indefinite"/>
                        </circle>
                    </svg>
                </span>
                </button>
            </div>
        </form>
    </div>
</div>   
</section>

{{-- End permissions window --}}
<!-- User Modal -->
<!-- Permissions Modal -->
<!-- Permissions Modal -->

{{-- End permissions window --}}






@endsection
