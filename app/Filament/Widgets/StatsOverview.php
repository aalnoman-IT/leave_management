<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Leave;

class StatsOverview extends BaseWidget
{


    protected function getStats(): array
    {
        $totalLeaveRequests = Leave::count();
        $totalApproved = Leave::where('leave_status_id', 1)->count();
        $totalRejected = Leave::where('leave_status_id', 2)->count();
        $totalPending = Leave::where('leave_status_id', 3)->count();
    
        return [
            Stat::make('Total Leave Requests', $totalLeaveRequests),
            Stat::make('Total Approved', $totalApproved),
            Stat::make('Total Rejected', $totalRejected),
            Stat::make('Total Pending', $totalPending),
        ];
    }
    public static function canView(): bool

    {

        $user = auth()->user();


        return $user->isAdmin();

    }
}
