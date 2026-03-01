<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class UserReportService
{
    /**
     * Return paginated users with aggregated report columns.
     * Zero N+1: all aggregations are resolved in ONE query via withCount / withSum / withAvg.
     */
    public function getUsersWithReportSummary(int $perPage = 10): LengthAwarePaginator
    {
        return User::query()
            ->withCount('reports')                          // → reports_count
            ->withSum('reports', 'target')                  // → reports_sum_target
            ->withSum('reports', 'realization')             // → reports_sum_realization
            ->withAvg('reports', 'achievement')             // → reports_avg_achievement
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }

    /**
     * Return a single user with report summary aggregations.
     */
    public function getUserWithReportSummary(int $userId): User
    {
        return User::query()
            ->withCount('reports')
            ->withSum('reports', 'target')
            ->withSum('reports', 'realization')
            ->withAvg('reports', 'achievement')
            ->findOrFail($userId);
    }

    /**
     * Return paginated, filtered report list for a user.
     * Eager-loads classification, unit, evidence in ONE extra query each (no N+1).
     *
     * @param array{
     *     start_date?: string|null,
     *     end_date?: string|null,
     *     classification_id?: int|null,
     *     unit_id?: int|null,
     * } $filters
     */
    public function getUserReports(
        int   $userId,
        array $filters  = [],
        int   $perPage  = 15,
        bool  $withEvidence = true
    ): LengthAwarePaginator {
        $query = User::findOrFail($userId)
            ->reports()
            ->with($this->buildEagerLoads($withEvidence))
            ->orderBy('report_date', 'desc');

        $this->applyFilters($query, $filters);

        return $query->paginate($perPage);
    }

    // ─── Private helpers ──────────────────────────────────────────────────────

    private function buildEagerLoads(bool $withEvidence): array
    {
        $loads = ['classification', 'unit'];

        if ($withEvidence) {
            $loads[] = 'evidence';
        }

        return $loads;
    }

    private function applyFilters(Builder $query, array $filters): void
    {
        if (!empty($filters['start_date'])) {
            $query->whereDate('report_date', '>=', $filters['start_date']);
        }

        if (!empty($filters['end_date'])) {
            $query->whereDate('report_date', '<=', $filters['end_date']);
        }

        if (!empty($filters['classification_id'])) {
            $query->where('classification_id', $filters['classification_id']);
        }

        if (!empty($filters['unit_id'])) {
            $query->where('unit_id', $filters['unit_id']);
        }
    }
}