@extends('layout.index')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Employee</h1>
        <a href="{{ route('employees') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- Add Employee Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Employee Information</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('employees.update',$employees->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                         <label for="position" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $employees->name }}" placeholder="Enter full name" required >
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{ $employees->email }}" id="email" class="form-control" placeholder="Enter email" required>
                    </div>

                    <!-- Position -->
                    <div class="col-md-6 mb-3">
                        <label for="position" class="form-label">Position<span class="text-danger">*</span></label>
                        <input type="text" name="position" id="position" value="{{ $employees->position }}" class="form-control" placeholder="Enter position" required>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone Number<span class="text-danger">*</span></label>
                        <input type="text" name="phone" id="phone" value="{{ $employees->phone }}" class="form-control" placeholder="Enter phone number" required>
                    </div>

                    <!-- Bank -->
                    <div class="col-md-6 mb-3">
                        <label for="bank" class="form-label">Bank Name</label>
                        <input type="text" name="bank" value="{{ $employees->bank }}" id="bank" class="form-control" placeholder="Enter bank name">
                    </div>

                    <!-- IBAN -->
                    <div class="col-md-6 mb-3">
                        <label for="iban" class="form-label">IBAN Number</label>
                        <input type="text" name="iban" id="iban" value="{{ $employees->iban }}" class="form-control" placeholder="Enter IBAN number">
                    </div>
                    {{-- <div class="col-md-6 mb-3">
                        <label for="iban" class="form-label">Image</label>
                        <input type="file" name="iban" id="iban" class="form-control" placeholder="">
                    </div> --}}
                </div>

                <!-- Buttons -->
                <div class="text-end mt-4">
                    <button type="reset" class="btn btn-light border">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Employee
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
