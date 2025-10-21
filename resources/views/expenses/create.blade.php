@extends('layout.index')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Expense</h1>
        <a href="{{ route('expenses.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New Expense</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('expenses.store') }}" method="POST">
                @csrf

                <div class="row">
                    <!-- Expense Type -->
                    <div class="col-md-6 mb-3">
                        <label for="expense_type_id" class="form-label">
                            Expense Type <span class="text-danger">*</span>
                        </label>
                        <select name="expense_type_id"
                                id="expense_type_id"
                                class="form-control"
                                required>
                            <option value="">Select Expense Type</option>
                            @foreach ($expenseTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Amount -->
                    <div class="col-md-6 mb-3">
                        <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                        <input type="number"
                               step="0.01"
                               name="amount"
                               id="amount"
                               class="form-control"
                               placeholder="Enter amount"
                               required>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status"
                                id="status"
                                class="form-control"
                                required>
                            <option value="">Select Status</option>
                            <option value="pending">Pending</option>
                            <option value="paid">Paid</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="text-end mt-4">
                    <button type="reset" class="btn btn-light border me-2">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Expense
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
