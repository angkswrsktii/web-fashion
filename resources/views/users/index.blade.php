@extends('layout.main')

@section('title', 'User Management')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User Management</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
            <i class="bi bi-plus-circle"></i>
            Create New User
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Contoh Data 1 (Admin) --}}
                    <tr>
                        <td>1</td>
                        <td>Super Admin</td>
                        <td>admin@fashion.com</td>
                        <td><span class="badge bg-primary">Admin</span></td>
                        <td>
                            <a href="{{ route('users.edit') }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Delete</button>
                        </td>
                    </tr>
                    {{-- Contoh Data 2 (POS/Kasir) --}}
                    <tr>
                        <td>2</td>
                        <td>Kasir 1</td>
                        <td>kasir1@fashion.com</td>
                        <td><span class="badge bg-info">POS</span></td>
                        <td>
                            <a href="{{ route('users.edit') }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Delete</button>
                        </td>
                    </tr>
                    {{-- Contoh Data 3 (Staff/Purchasing) --}}
                    <tr>
                        <td>3</td>
                        <td>Staff Gudang</td>
                        <td>staff@fashion.com</td>
                        <td><span class="badge bg-secondary">Purchasing</span></td>
                        <td>
                            <a href="{{ route('users.edit') }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection