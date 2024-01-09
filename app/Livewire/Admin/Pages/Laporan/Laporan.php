<?php

namespace App\Livewire\Admin\Pages\Laporan;

use App\Models\DetailTransaksiBeli;
use App\Models\Gaji;
use App\Models\Product;
use App\Models\TransaksiBeli;
use App\Models\TransaksiJualPagi;
use App\Models\TransaksiJualPagiDetail;
use App\Models\TransaksiJualSore;
use App\Models\TransaksiJualSoreDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class Laporan extends Component
{
    private $data;
    public $d_awal, $d_akhir;

    public function stokProduct()
    {
        $users = Product::get();

        $data = [
            'title' => get_setting()->title,
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        $pdf = Pdf::loadView('laporan.stok', $data)->output();

        $filename = 'product_stock_report_' . now()->format('Ymd_His') . '.pdf';

        return response()->streamDownload(
            fn () => print($pdf),
            $filename
        );
    }

    public function BarangDatang()
    {
        $beli = DetailTransaksiBeli::get();

        $data = [
            'title' => get_setting()->title,
            'date' => date('m/d/Y'),
            'beli' => $beli
        ];

        $pdf = Pdf::loadView('laporan.barangbeli', $data)->output();

        $filename = 'barang_beli_report_' . now()->format('Ymd_His') . '.pdf';

        return response()->streamDownload(
            fn () => print($pdf),
            $filename
        );
    }

    public function BarangKeluarPagi()
    {
        $beli = TransaksiJualPagiDetail::get();

        $data = [
            'title' => get_setting()->title,
            'date' => date('m/d/Y'),
            'beli' => $beli
        ];

        $pdf = Pdf::loadView('laporan.barangjualpagi', $data)->output();

        $filename = 'barang_jual_pagi_report_' . now()->format('Ymd_His') . '.pdf';

        return response()->streamDownload(
            fn () => print($pdf),
            $filename
        );
    }

    public function BarangKeluarSore()
    {
        $beli = TransaksiJualSoreDetail::get();

        $data = [
            'title' => get_setting()->title,
            'date' => date('m/d/Y'),
            'beli' => $beli
        ];

        $pdf = Pdf::loadView('laporan.barangjualsore', $data)->output();

        $filename = 'barang_jual_sore_report_' . now()->format('Ymd_His') . '.pdf';

        return response()->streamDownload(
            fn () => print($pdf),
            $filename
        );
    }

    public function dataHutangVendor()
    {
        $beli = TransaksiBeli::where('sisa', '>', 0)->get();

        $data = [
            'title' => get_setting()->title,
            'date' => date('m/d/Y'),
            'beli' => $beli
        ];

        $pdf = Pdf::loadView('laporan.datahutangvendor', $data)->output();

        $filename = 'data_hutang_vendor_report_' . now()->format('Ymd_His') . '.pdf';

        return response()->streamDownload(
            fn () => print($pdf),
            $filename
        );
    }

    public function dataHutangAgent()
    {
        $beli = TransaksiJualSore::where('sisa', '>', 0)->get();

        $data = [
            'title' => get_setting()->title,
            'date' => date('m/d/Y'),
            'beli' => $beli
        ];

        $pdf = Pdf::loadView('laporan.datahutangagent', $data)->output();

        $filename = 'data_hutang_agent_report_' . now()->format('Ymd_His') . '.pdf';

        return response()->streamDownload(
            fn () => print($pdf),
            $filename
        );
    }

    public function laporanGaji()
    {
        $rules['d_awal'] = 'required';
        $rules['d_akhir'] = 'required';
        $this->validate($rules);
        $beli = Gaji::whereBetween('created_at', [$this->d_awal, $this->d_akhir])->get();

        $data = [
            'title' => get_setting()->title,
            'date' => date('m/d/Y'),
            'beli' => $beli
        ];

        $pdf = Pdf::loadView('laporan.data_gaji', $data)->output();

        $filename = 'data_gaji_report_' . now()->format('Ymd_His') . '.pdf';

        return response()->streamDownload(
            fn () => print($pdf),
            $filename
        );
    }

    public function render()
    {
        return view('livewire.admin.pages.laporan.laporan');
    }
}
