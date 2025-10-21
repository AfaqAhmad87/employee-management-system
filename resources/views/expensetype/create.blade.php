@extends('layout.index')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Expense Type</h1>
        <a href="{{ route("expensetype.index") }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- Add Employee Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <form action="{{ route('expensetype.store') }}" method="POST">
                @csrf

                <div class="row">
                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                         <label for="position" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Enter Description" required>
                    </div>


                </div>

                <!-- Buttons -->
                <div class="text-end mt-4">
                    <button type="reset" class="btn btn-light border">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Expense Type
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
