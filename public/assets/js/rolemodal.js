
function openConfirm() {
    document.getElementById("confirmBox").style.display = "block";
}

async function refreshUsers() {
    const res  = await fetch(window.location.href, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    });
    const html = await res.text();

    // نحول النص لـ DOM ونجيب منه الـ grid الجديد بس
    const doc     = new DOMParser().parseFromString(html, 'text/html');
    const newGrid = doc.querySelector('.users-grid');

    document.querySelector('.users-grid').innerHTML = newGrid.innerHTML;
}

function closeConfirm() {
    document.getElementById("confirmBox").style.display = "none";
}

function confirmClose() {

    Swal.fire({
        title: 'Cancel process?',
        text: "All entered data will be lost.",
        icon: 'warning',
        background: '#1e293b',
        color: '#fff',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#1f2937',
        confirmButtonText: 'Yes, cancel',
        cancelButtonText: 'No, continue',
        allowOutsideClick: false,
        allowEscapeKey: false,
        backdrop: true
    }).then((result) => {

        if (result.isConfirmed) {
            resetModal();
            document.getElementById("Creationmodal").style.display = "none";
            
        }

    });

}


function confirmCancel() {
    resetModal();
    document.getElementById("userModal").style.display = "none";
}




/* Reset كامل */
function resetModal() {

    // document.getElementById("step2").classList.remove("active");
    document.getElementById("step1").classList.add("active");

    document.querySelectorAll('.role-card')
        .forEach(card => card.classList.remove('active'));

    selectedRole = null;

    document.getElementById("nextBtn").disabled = true;

    // document.querySelector("#step2 form").reset();
}

/* دايمًا نبدأ من الأول */
function openCreationmodal() {
    resetModal();
    document.getElementById("Creationmodal").style.display = "flex";
}


// ===== إعدادات Swal المشتركة =====
const swalBase = {
    background: 'transparent',
    customClass: {
        popup: 'dark-swal-popup',
        title: 'dark-swal-title',
        htmlContainer: 'dark-swal-text',
        confirmButton: 'dark-swal-btn'
    },
    buttonsStyling: false
};

// ===== دالة عامة تربط أي فورم بـ fetch =====
function bindAjaxForm(formId, onSuccess) {
    const form = document.getElementById(formId);
    if (!form) return;                       // الفورم مش في الصفحة دي، تجاهل

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const btn     = form.querySelector('button[type="submit"]');   // الزرار جوه الفورم دي بس
        const btnText = btn.querySelector('.btn-text');
        const spinner = btn.querySelector('.spinner');

        const setLoading = (loading) => {
            if (btnText) btnText.style.display = loading ? 'none' : 'inline';
            if (spinner) spinner.style.display = loading ? 'inline-block' : 'none';
            btn.disabled = loading;
        };

        setLoading(true);

        fetch(form.dataset.url, {
            method: 'POST',                  // _method=put جوه الفورم
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: new FormData(form)
        })
        .then(res => res.json().then(body => {
            if (!res.ok) throw body;
            return body;
        }))
        .then(async data => {
            setLoading(false);
            if (!data.success) throw data;

            Swal.fire({ ...swalBase, icon: 'success', title: 'Success', text: data.message });

            await onSuccess(form);
        })
        .catch(err => {
            setLoading(false);

            const firstError = err.errors ? Object.values(err.errors)[0][0] : null;

            Swal.fire({
                ...swalBase,
                icon: 'error',
                title: 'Error',
                text: firstError || err.message || 'Something went wrong!'
            });

            console.error(err);
        });
    });
}

// ===== تسجيل الفورمز (بعد ما الصفحة تتحمّل) =====
document.addEventListener('DOMContentLoaded', () => {

    // إنشاء يوزر
    bindAjaxForm('createUserForm', async (form) => {
        form.reset();
        await refreshUsers();
    });

    // تغيير رول يوزر
    bindAjaxForm('rolesForm', async () => {
        closeRolesModal();                   // بتعمل reset وبتقفل
        await refreshUsers();
    });

    // تعديل صلاحيات رول
    bindAjaxForm('editRoleForm', async () => {
        closePermissionsmodal();
        await refreshUsers();                 // أو refreshRolesList() لو عملتها
    });

});

function editRoleModal(roleId) {
    const btn = document.getElementById(`rolePermBtn-${roleId}`);
    if (!btn) return console.error(`rolePermBtn-${roleId} not found`);

    const ids = JSON.parse(btn.dataset.permissionIds || '[]');   // الصلاحيات الحالية للرول

    document.getElementById('selectedRoleId').value = roleId;

    document.querySelectorAll('#editRoleForm input[name="permissions[]"]').forEach(cb => {
        cb.checked = ids.includes(parseInt(cb.value));
    });

    document.getElementById('permissionsModal').style.display = 'flex';
}

function closeEditRoleModal() {
    document.getElementById('permissionsModal').style.display = 'none';
    document.getElementById('editRoleForm').reset();          // ← editRoleForm مش permissionsForm
    document.getElementById('selectedRoleId').value = '';
}