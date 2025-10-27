<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\SalesDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tanggal dari query, default 30 hari terakhir
        $startDate = $request->query('start_date', now()->subDays(30)->toDateString());
        $endDate = $request->query('end_date', now()->toDateString());

        // Ambil semua sales dalam rentang waktu
        $sales = Sales::whereBetween('tanggal', [$startDate, $endDate])->get();

        // Hitung total revenue
        $totalRevenue = $sales->sum('total');

        // Hitung total order
        $totalOrders = $sales->count();

        // Hitung rata-rata order value
        $avgOrderValue = $totalOrders > 0 ? $totalRevenue / $totalOrders : 0;

        // Sales trend (per tanggal)
        $salesTrend = Sales::select(
                DB::raw('DATE(tanggal) as date'),
                DB::raw('SUM(total) as revenue')
            )
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Top Selling Products
        $topProducts = SalesDetail::select(
                'products.name as product_name',
                DB::raw('SUM(sales_details.quantity) as units_sold')
            )
            ->join('products', 'sales_details.product_id', '=', 'products.id')
            ->join('sales', 'sales.id', '=', 'sales_details.sale_id')
            ->whereBetween('sales.tanggal', [$startDate, $endDate])
            ->groupBy('products.name')
            ->orderByDesc('units_sold')
            ->limit(5)
            ->get();

        return response()->json([
            'status' => 200,
            'message' => 'Report generated successfully',
            'data' => [
                'start_date' => $startDate,
                'end_date' => $endDate,
                'total_revenue' => $totalRevenue,
                'total_orders' => $totalOrders,
                'avg_order_value' => round($avgOrderValue, 2),
                'sales_trend' => $salesTrend,
                'top_products' => $topProducts
            ]
        ]);
    }
}