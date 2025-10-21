@extends('layout.index')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Expenses</h1>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">

            <!-- Search Bar -->
            <form method="GET" action="{{ route('expenses.index') }}" class="d-flex" style="max-width: 400px; flex-grow: 1;">
                <div class="input-group w-100">
                    <input type="text" name="search" value="{{ request('search') }}"
                           class="form-control bg-light border-0 shadow-sm"
                           placeholder="Search expenses..."
                           aria-label="Search" aria-describedby="button-search">
                    <button class="btn btn-primary" type="submit" id="button-search">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </form>

            <!-- Add Expense Button -->
            <a href="{{ route('expenses.create') }}" class="btn btn-primary btn-icon-split ms-md-3">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Expense</span>
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                @if ($expenses->count() > 0)
                    <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Sr.No</th>
                                <th>Expense Type</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th width="150">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $index => $expense)
                                <tr>
                                    {{-- @dd($expense); --}}
                                    <td>{{ $expenses->firstItem() + $index }}.</td>
                                    <td>{{ $expense->expenseType?->title ?? 'N/A' }}</td>
                                    <td>{{ $expense->expenseType?->description }}</td>
                                    <td><span class="fs-5 text-dark">₨</span> {{ number_format($expense->amount, 2) }}</td>
                                    <td>
                                        @if ($expense->status === 'paid')
                                            <span class="badge bg-success">Paid</span>
                                        @elseif ($expense->status === 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @else
                                            <span class="badge bg-secondary">{{ ucfirst($expense->status) }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $expense->created_at->format('d M Y') }}</td>
                                    <td class="text-center">
                                        <!-- Edit -->
                                        <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this expense?');">
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
                        {{ $expenses->links('pagination::bootstrap-5') }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <h5 class="text-muted">No expenses found.</h5>
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
        url.searchParams.delete('search');
        window.history.replaceState({}, document.title, url.pathname);
    }
});
</script>
