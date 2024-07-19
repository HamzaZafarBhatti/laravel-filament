<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class ProductsChartOverview extends ChartWidget
{
    protected static ?string $heading = 'Products';
    protected static ?string $pollingInterval = '15s';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = $this->getProductsPerMonth();
        return [
            'datasets' => [
                [
                    'label' => 'Products',
                    'data' => $data['productsPerMonth']
                ]
            ],
            'labels' => $data['months']
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    private function getProductsPerMonth(): array
    {
        $now = now();
        $productsPerMonth = collect(range(1, 12))->map(function ($month) use ($now) {
            return Product::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->count();
        })->toArray();

        $months = collect(range(1, 12))->map(function ($month) use ($now) {
            return $now->month($month)->format('M');
        })->toArray();
        
        return [
            'productsPerMonth' => $productsPerMonth,
            'months' => $months,
        ];
    }
}
