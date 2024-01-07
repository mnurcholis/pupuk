<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Agent;
use App\Models\Gaji;
use App\Models\Karyawan;
use App\Models\Operasional;
use App\Models\Product;
use App\Models\TransaksiBeli;
use App\Models\TransaksiJualSore;
use App\Models\Vendor;
use Livewire\Component;

class Home extends Component
{
    public $karyawan, $product, $agent, $vendor, $pengeluaran, $pemasukan;

    public function mount()
    {
        $this->karyawan = Karyawan::all();
        $this->product = Product::all();
        $this->agent = Agent::all();
        $this->vendor = Vendor::all();
        $beli = TransaksiBeli::all();
        $gaji = Gaji::all();
        $operasional = Operasional::all();
        $this->pengeluaran = $beli->sum('total') + $gaji->sum('gaji') + $gaji->sum('bonus') + $operasional->sum('total');
        $this->pemasukan = TransaksiJualSore::all();
    }

    public function render()
    {
        return view('livewire.admin.pages.home');
    }
}
