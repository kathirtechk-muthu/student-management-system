
@extends('layouts.app')

@section('title', 'Add Student')

@section('page-heading', 'Add New Student')

@section('content')

<div class="content-card">

    <div class="mb-4">
        <h5 class="fw-bold">Student Information</h5>
        <p class="text-secondary small">Enter the student details below.</p>
    </div>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Student Name *</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name') }}" placeholder="Enter student name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Email Address *</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email') }}" placeholder="Enter email address">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control"
                       value="{{ old('phone') }}" placeholder="Enter phone number">
                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Course *</label>
                <select name="course" class="form-select">
                    <option value="">Select Course</option>
                    <option value="PHP Development">PHP Development</option>
                    <option value="Laravel Development">Laravel Development</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Full Stack Development">Full Stack Development</option>
                </select>
                @error('course') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control"
                       value="{{ old('date_of_birth') }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Status *</label>
                <select name="status" class="form-select">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>

            <div class="col-12">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" rows="3"
                          placeholder="Enter student address">{{ old('address') }}</textarea>
            </div>

        </div>

        <hr class="my-4">

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('students.index') }}" class="btn btn-light">
                Cancel
            </a>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-lg me-2"></i> Save Student
            </button>
        </div>

    </form>

</div>

@endsection
