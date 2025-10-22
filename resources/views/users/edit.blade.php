@extends('layout.main')

@section('title', 'Edit User')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User: Super Admin</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="#" method="POST">
            {{-- @csrf --}}
            {{-- @method('PUT') --}}
            
            {{-- Bagian Detail Pengguna --}}
            <h5>User Details</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    {{-- Di aplikasi nyata, 'value' akan diisi dari data controller --}}
                    <input type="text" class="form-control" id="name" value="Super Admin" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" value="admin@fashion.com" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role" required>
                        <option value="" disabled>Choose role...</option>
                        <option value="admin" selected>Admin</option> {{-- 'selected' akan dinamis --}}
                        <option value="pos">POS</option>
                        <option value="purchasing">Purchasing</option>
                        <option value="inventory">Inventory</option>
                    </select>
                </div>
            </div>
            
            <hr class="my-4">

            {{-- Bagian Ganti Password --}}
            <h5>Change Password</h5>
            <small class="text-muted">(Leave blank to keep the current password)</small>
            <div class="row mt-2">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="password_confirmation">
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('users.index') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Update User</button>
            </div>
        </form>
    </div>
</div>
@endsection