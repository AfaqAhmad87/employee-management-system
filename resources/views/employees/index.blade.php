@extends('layout.index')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Employees</h1>

        <!-- Employees Table -->
        <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">

    <!-- Search Bar -->
    <form method="GET" action="{{ route('employees') }}" class="d-flex" style="max-width: 400px; flex-grow: 1;">
        <div class="input-group w-100">
            <input type="text" name="search" value="{{ request('search') }}"
                   class="form-control bg-light border-0 shadow-sm"
                   placeholder="Search employees..."
                   aria-label="Search" aria-describedby="button-search">
            <button class="btn btn-primary" type="submit" id="button-search">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </form>

    <!-- Add Employee Button -->
    <a href="{{ route('employees.create') }}" class="btn btn-primary btn-icon-split ms-md-3">
        <span class="icon text-white-50">
            <i class="fas fa-user-plus"></i>
        </span>
        <span class="text">Add Employee</span>
    </a>
</div>


            <div class="card-body">
                <div class="table-responsive">

                    {{-- Table --}}
                    @if ($employees->count() > 0)
                        <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Bank</th>
                                    <th>Iban</th>
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->position }}</td>
                                        <td>{{ $employee->bank }}</td>
                                        <td>{{ $employee->iban }}</td>
                                        <td class="text-center">
                                            <!-- Edit -->
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Delete -->
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this employee?');">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $employees->links('pagination::bootstrap-5') }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <h5 class="text-muted">No employees found.</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
document.addEventListener("DOMContentLoaded", function() {
    const url = new URL(window.location.href);
    if (url.searchParams.has('search')) {
        // Remove the "search" param and refresh the address bar
        url.searchParams.delete('search');
        window.history.replaceState({}, document.title, url.pathname);
    }
});
</script>
