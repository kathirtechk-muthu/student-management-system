
@extends('layouts.app')

@section('title', 'Edit Student')

@section('page-heading', 'Edit Student')

@section('content')

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Update Student Information</h5>
            <p class="text-secondary small mb-0">
                Edit the details of {{ $student->name }}
            </p>
        </div>

        <span class="badge bg-primary-subtle text-primary">
            Student ID: {{ $student->id }}
        </span>
    </div>

    <form action="{{ route('students.update', $student->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="row g-3">

            <!-- Student Name -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Student Name *</label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name', $student->name) }}"
                       placeholder="Enter student name">

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Email -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Email Address *</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email', $student->email) }}"
                       placeholder="Enter email address">

                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Phone -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Phone Number</label>

                <input type="text"
                       name="phone"
                       class="form-control"
                       value="{{ old('phone', $student->phone) }}"
                       placeholder="Enter phone number">

                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Course -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Course *</label>

                <select name="course" class="form-select">
                    <option value="">Select Course</option>

                    @foreach([
                        'PHP Development',
                        'Laravel Development',
                        'Web Development',
                        'Full Stack Development'
                    ] as $course)

                        <option value="{{ $course }}"
                            {{ old('course', $student->course) == $course ? 'selected' : '' }}>
                            {{ $course }}
                        </option>

                    @endforeach
                </select>

                @error('course')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Gender -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Gender</label>

                <select name="gender" class="form-select">
                    <option value="">Select Gender</option>

                    @foreach(['Male', 'Female', 'Other'] as $gender)

                        <option value="{{ $gender }}"
                            {{ old('gender', $student->gender) == $gender ? 'selected' : '' }}>
                            {{ $gender }}
                        </option>

                    @endforeach
                </select>
            </div>

            <!-- DOB -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Date of Birth</label>

                <input type="date"
                       name="date_of_birth"
                       class="form-control"
                       value="{{ old('date_of_birth', $student->date_of_birth) }}">
            </div>

            <!-- Status -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Student Status *</label>

                <select name="status" class="form-select">

                    <option value="Active"
                        {{ old('status', $student->status) == 'Active' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="Inactive"
                        {{ old('status', $student->status) == 'Inactive' ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

                @error('status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Address -->
            <div class="col-12">
                <label class="form-label fw-semibold">Address</label>

                <textarea name="address"
                          class="form-control"
                          rows="4"
                          placeholder="Enter student address">{{ old('address', $student->address) }}</textarea>

                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        </div>

        <hr class="my-4">

        <div class="d-flex justify-content-end gap-2">

            <a href="{{ route('students.index') }}" class="btn btn-light">
                <i class="bi bi-arrow-left me-1"></i>
                Cancel
            </a>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-lg me-1"></i>
                Update Student
            </button>

        </div>

    </form>

</div>

@endsection

