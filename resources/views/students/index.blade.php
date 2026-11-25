
@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('page-heading', 'Student Overview')

@section('content')

<!-- Statistics Cards -->
<div class="row g-4 mb-4">

    <div class="col-xl-4 col-md-6">
        <div class="content-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary small mb-2">Total Students</p>
                    <h3 class="fw-bold mb-0">{{ $students->total() }}</h3>
                </div>
                <div class="rounded-3 p-3" style="background:#eeeaff;color:#6857e8;">
                    <i class="bi bi-people fs-4"></i>
                </div>
            </div>
            <p class="small text-secondary mt-3 mb-0">Registered students</p>
        </div>
    </div>

    <div class="col-xl-4 col-md-6">
        <div class="content-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary small mb-2">Active Students</p>
                    <h3 class="fw-bold mb-0">
                        {{ \App\Models\Student::where('status', 'Active')->count() }}
                    </h3>
                </div>
                <div class="rounded-3 p-3" style="background:#e4f8ed;color:#16a34a;">
                    <i class="bi bi-person-check fs-4"></i>
                </div>
            </div>
            <p class="small text-secondary mt-3 mb-0">Currently active</p>
        </div>
    </div>

    <div class="col-xl-4 col-md-6">
        <div class="content-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary small mb-2">Inactive Students</p>
                    <h3 class="fw-bold mb-0">
                        {{ \App\Models\Student::where('status', 'Inactive')->count() }}
                    </h3>
                </div>
                <div class="rounded-3 p-3" style="background:#fff0e5;color:#f08b37;">
                    <i class="bi bi-person-dash fs-4"></i>
                </div>
            </div>
            <p class="small text-secondary mt-3 mb-0">Currently inactive</p>
        </div>
    </div>

</div>

<!-- Student Table -->
<div class="content-card">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>
            <h5 class="fw-bold mb-1">Student Directory</h5>
            <p class="text-secondary small mb-0">
                Manage your registered students
            </p>
        </div>

        <a href="{{ route('students.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i> Add Student
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">

        <table class="table align-middle">

            <thead>
                <tr class="text-secondary small">
                  <th>ID</th>
                  <th>STUDENT</th>
                  <th>EMAIL</th>
                  <th>PHONE</th>
                 <th>COURSE</th>
                 <th>STATUS</th>
                 <th>ACTION</th>
              </tr>
            </thead>

            <tbody>

                @forelse($students as $student)
<tr>
    <td>{{ $students->firstItem() + $loop->index }}</td>

    <td>
        <div class="fw-semibold">{{ $student->name }}</div>
    </td>

    <td>{{ $student->email }}</td>

    <td>{{ $student->phone ?? '-' }}</td>

    <td>{{ $student->course }}</td>

    <td>
        @if($student->status === 'Active')
            <span class="badge bg-success-subtle text-success">Active</span>
        @else
            <span class="badge bg-danger-subtle text-danger">Inactive</span>
        @endif
    </td>

    <td>
        <a href="{{ route('students.edit', $student->id) }}"
           class="btn btn-sm btn-light">
            <i class="bi bi-pencil"></i>
        </a>

        <form action="{{ route('students.destroy', $student->id) }}"
              method="POST"
              class="d-inline"
              onsubmit="return confirm('Are you sure you want to delete this student?')">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-sm btn-light text-danger">
                <i class="bi bi-trash"></i>
            </button>
        </form>
    </td>
</tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="bi bi-people fs-1 text-secondary"></i>
                            <h6 class="mt-3 fw-bold">No students found</h6>
                            <p class="text-secondary small">Add your first student to get started.</p>
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-3">
        {{ $students->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection
