<?php

namespace App\Filament\Widgets;

use App\Enums\OrderStatus;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';
    protected static bool $isLazy = true;

    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total Customers', Customer::count())
                ->description('Increase in customers')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('success')
                ->chart([
                    7, 2, 10, 3, 15, 4, 17
                ]),
            Stat::make('Total Products', Product::count())
                ->description('Total products')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([
                    7, 2, 10, 3, 15, 4, 17
                ]),
            Stat::make('Pending Orders', Order::where('status', OrderStatus::PENDING->value)->count())
                ->description('Total pending orders')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([
                    7, 2, 10, 3, 15, 4, 17
                ]),
        ];
    }
}
