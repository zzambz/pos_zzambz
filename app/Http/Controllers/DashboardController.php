<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LaporanPenjualanService;
use App\Services\MonitoringStokService;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    protected $laporanService;
    protected $stokService;

    public function __construct(
        LaporanPenjualanService $laporanService,
        MonitoringStokService $stokService
    ) {
        $this->laporanService = $laporanService;
        $this->stokService = $stokService;
    }

    public function index()
    {
        // Ambil ringkasan hari ini
        $ringkasan = $this->laporanService->ringkasanHariIni() ?? [];

        // Default value biar aman
        $ringkasan = [
            'total_penjualan'   => $ringkasan['total_penjualan'] ?? 0,
            'jumlah_transaksi'  => $ringkasan['jumlah_transaksi'] ?? 0,
            'total_cash'        => $ringkasan['total_cash'] ?? 0,
            'total_non_tunai'   => $ringkasan['total_non_tunai'] ?? 0,
        ];

        // Ambil data lain
        $produkTerlaris   = $this->laporanService->produkTerlarisHariIni();
        $produkStokRendah = $this->stokService->produkStokRendah();
        $produkStokHabis  = $this->stokService->produkStokHabis();

        return view('dashboard', compact(
            'ringkasan',
            'produkTerlaris',
            'produkStokRendah',
            'produkStokHabis'
        ) + [
            'tanggalHariIni' => Carbon::now(),
        ]);
    }
}