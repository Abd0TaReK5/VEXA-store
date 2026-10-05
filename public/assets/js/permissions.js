function openModal(userId) {
    document.getElementById('selectedUserId').value = userId;

    const modal = document.getElementById("RolesChangeModal");
    const btn   = document.getElementById(`roleBtn-${userId}`);

    // user name
    document.getElementById('modalUserName').textContent = btn.dataset.userName;

    // user current role (maybe empty)
    const roleId = btn.dataset.roleId ? parseInt(btn.dataset.roleId) : null;

    
    document.querySelectorAll('#rolesForm input[name="role_id"]').forEach(rb => {
        rb.checked = (parseInt(rb.value) === roleId);
    });
    

    modal.style.display = "flex";
}

function openRolemodal() {
    resetModal();
    document.getElementById("Creationmodal").style.display = "flex";
}




function closeRolesModal() {
    const modal = document.getElementById("RolesChangeModal");
    const form = document.getElementById("rolesForm");
    modal.style.display = "none";
    form.reset();   
    document.getElementById("selectedUserId").value = "";
}

function saveRoles() {
    const form = document.getElementById('rolesForm');
    const data = new FormData(form);
    const permissions = {};
    data.forEach((value, key) => permissions[key] = value);

    console.log("Saved role:", permissions);

    closeRolesModal();
}   




function closePermissionsmodal() {
    const modal = document.getElementById("permissionsModal");
    const form = document.getElementById("editRoleForm");
    modal.style.display = "none";
    form.reset();   
    document.getElementById("selectedRoleId").value = "";
}

function savePermissions() {
    const form = document.getElementById('editRoleForm');
    const data = new FormData(form);
    const permissions = {};
    data.forEach((value, key) => permissions[key] = value);

    console.log("Saved Permissions:", permissions);

    closePermissionsmodal();
}    

