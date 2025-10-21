@extends('layout.index')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Expense</h1>
        <a href="{{ route('expenses.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- Update Expense Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            {{-- <h6 class="m-0 font-weight-bold text-primary">Expense Information</h6> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Expense Type -->
                    <div class="col-md-6 mb-3">
                        <label for="expense_type_id" class="form-label">Expense Type <span class="text-danger">*</span></label>
                        <select name="expense_type_id" id="expense_type_id" class="form-control" required>
                            <option value="">-- Select Expense Type --</option>
                            @foreach($expensetypes as $type)
                                <option value="{{ $type->id }}" {{ $expense->expense_type_id == $type->id ? 'selected' : '' }}>
                                    {{ $type->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Amount -->
                    <div class="col-md-6 mb-3">
                        <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="amount" id="amount"
                               class="form-control"
                               value="{{ $expense->amount }}"
                               placeholder="Enter Amount" required>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="pending" {{ $expense->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ $expense->status === 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="cancelled" {{ $expense->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="text-end mt-4">
                    <button type="reset" class="btn btn-light border">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Expense
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
