<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classification;
use App\Models\Unit;
use App\Services\UserReportService;

class UserAdminController extends Controller
{
    public function __construct(private UserReportService $service) {}

    /** User listing with aggregated report columns. */
    public function index()
    {
        $users = $this->service->getUsersWithReportSummary(perPage: 10);

        return view('admin.users.index', compact('users'));
    }

    /** User detail with report summary + filtered/paginated report list. */
    public function show(int $id)
    {
        $user    = $this->service->getUserWithReportSummary($id);
        $filters = request()->only(['start_date', 'end_date', 'classification_id', 'unit_id']);
        $reports = $this->service->getUserReports($id, $filters, perPage: 15, withEvidence: true);

        $classifications = Classification::orderBy('name')->get(['id', 'name']);
        $units           = Unit::orderBy('name')->get(['id', 'name']);

        return view('admin.users.show', compact('user', 'reports', 'classifications', 'units'));
    }
}