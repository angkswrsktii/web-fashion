@extends('layout.main')

@section('title', 'Create New User')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New User</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="#" method="POST">
            {{-- @csrf --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="John Doe" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role" required>
                        <option value="" selected disabled>Choose role...</option>
                        <option value="admin">Admin</option>
                        <option value="pos">POS</option>
                        <option value="purchasing">Purchasing</option>
                        <option value="inventory">Inventory</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" required>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('users.index') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Save User</button>
            </div>
        </form>
    </div>
</div>
@endsection