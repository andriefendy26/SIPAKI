{{-- resources/views/admin/users/show.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container-fluid">

  {{-- ── User Profile Card ─────────────────────────────────────────────────── --}}
  <div class="card mb-4">
    <div class="card-header fw-bold">User Profile</div>
    <div class="card-body row g-3">
      <div class="col-md-3"><label class="text-muted">Name</label><p>{{ $user->name }}</p></div>
      <div class="col-md-3"><label class="text-muted">Email</label><p>{{ $user->email }}</p></div>
      <div class="col-md-2"><label class="text-muted">NIK</label><p>{{ $user->nik ?? '-' }}</p></div>
      <div class="col-md-2"><label class="text-muted">Position</label><p>{{ $user->jabatan ?? '-' }}</p></div>
      <div class="col-md-2"><label class="text-muted">Department</label><p>{{ $user->bagian ?? '-' }}</p></div>
    </div>
  </div>

  {{-- ── Report Summary ────────────────────────────────────────────────────── --}}
  <div class="card mb-4">
    <div class="card-header fw-bold">Report Summary</div>
    <div class="card-body row text-center g-3">
      <div class="col-md-3">
        <div class="border rounded p-3">
          <div class="fs-4 fw-bold text-primary">{{ $user->reports_count }}</div>
          <small class="text-muted">Total Reports</small>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border rounded p-3">
          <div class="fs-4 fw-bold text-info">{{ number_format($user->reports_sum_target, 2) }}</div>
          <small class="text-muted">Total Target</small>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border rounded p-3">
          <div class="fs-4 fw-bold text-success">{{ number_format($user->reports_sum_realization, 2) }}</div>
          <small class="text-muted">Total Realization</small>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border rounded p-3">
          @php $avg = $user->reports_avg_achievement ?? 0; @endphp
          <div class="fs-4 fw-bold {{ $avg >= 90 ? 'text-success' : ($avg >= 70 ? 'text-warning' : 'text-danger') }}">
            {{ number_format($avg, 2) }}%
          </div>
          <small class="text-muted">Avg Achievement</small>
        </div>
      </div>
    </div>
  </div>

  {{-- ── Filter Form ───────────────────────────────────────────────────────── --}}
  <div class="card mb-4">
    <div class="card-header fw-bold">Filter Reports</div>
    <div class="card-body">
      <form method="GET" class="row g-2 align-items-end">
        <div class="col-md-3">
          <label class="form-label">From Date</label>
          <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>
        <div class="col-md-3">
          <label class="form-label">To Date</label>
          <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>
        <div class="col-md-2">
          <label class="form-label">Classification</label>
          <select name="classification_id" class="form-select">
            <option value="">All</option>
            @foreach($classifications as $c)
              <option value="{{ $c->id }}" {{ request('classification_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label class="form-label">Unit</label>
          <select name="unit_id" class="form-select">
            <option value="">All</option>
            @foreach($units as $u)
              <option value="{{ $u->id }}" {{ request('unit_id') == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary w-100">Apply</button>
        </div>
      </form>
    </div>
  </div>

  {{-- ── Detailed Report List ─────────────────────────────────────────────── --}}
  <div class="card">
    <div class="card-header fw-bold">Detailed Reports</div>
    <div class="card-body p-0">
      <table class="table table-hover mb-0">
        <thead class="table-light">
          <tr>
            <th>Date</th>
            <th>Classification</th>
            <th>Unit</th>
            <th>Description</th>
            <th class="text-end">Target</th>
            <th class="text-end">Realization</th>
            <th class="text-end">Achievement</th>
            <th>Evidence</th>
          </tr>
        </thead>
        <tbody>
          @forelse($reports as $report)
          <tr>
            <td>{{ $report->report_date->format('d M Y') }}</td>
            <td>{{ $report->classification->name ?? '-' }}</td>
            <td>{{ $report->unit->name ?? '-' }}</td>
            <td>{{ Str::limit($report->description, 60) }}</td>
            <td class="text-end">{{ number_format($report->target, 2) }}</td>
            <td class="text-end">{{ number_format($report->realization, 2) }}</td>
            <td class="text-end">
              @php $ach = $report->achievement; @endphp
              <span class="badge bg-{{ $ach >= 90 ? 'success' : ($ach >= 70 ? 'warning' : 'danger') }}">
                {{ number_format($ach, 2) }}%
              </span>
            </td>
            <td>
              @foreach($report->evidence as $ev)
                <a href="{{ asset('storage/' . $ev->file_path) }}" target="_blank" class="d-block small">
                  📎 {{ basename($ev->file_path) }}
                </a>
              @endforeach
            </td>
          </tr>
          @empty
          <tr><td colspan="8" class="text-center text-muted py-4">No reports found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      {{ $reports->withQueryString()->links() }}
    </div>
  </div>

</div>
@endsection