<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Laporan" subjudul="Laporan" :breadcrumb="['Laporan']" />
    </x-slot>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Data Stok Barang</h5>
                </div>
                <div class="card-body">
                    <div>
                        <button class="btn btn-primary" wire:click="stokProduct" wire:loading.attr="disabled">
                            <span wire:loading.attr="stokProduct">Generate PDF</span>
                            <div wire:loading wire:target="stokProduct">
                                Downloading Report...
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Data Detail Barang Datang</h5>
                </div>
                <div class="card-body">
                    <div>
                        <button class="btn btn-primary" wire:click="BarangDatang" wire:loading.attr="disabled">
                            <span wire:loading.attr="BarangDatang">Generate PDF</span>
                            <div wire:loading wire:target="BarangDatang">
                                Downloading Report...
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Data Detail Barang Keluar Pagi</h5>
                </div>
                <div class="card-body">
                    <div>
                        <button class="btn btn-primary" wire:click="BarangKeluarPagi" wire:loading.attr="disabled">
                            <span wire:loading.attr="BarangKeluarPagi">Generate PDF</span>
                            <div wire:loading wire:target="BarangKeluarPagi">
                                Downloading Report...
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Data Detail Barang Keluar Sore</h5>
                </div>
                <div class="card-body">
                    <div>
                        <button class="btn btn-primary" wire:click="BarangKeluarSore" wire:loading.attr="disabled">
                            <span wire:loading.attr="BarangKeluarSore">Generate PDF</span>
                            <div wire:loading wire:target="BarangKeluarSore">
                                Downloading Report...
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Data Hutang Vendor</h5>
                </div>
                <div class="card-body">
                    <div>
                        <button class="btn btn-primary" wire:click="dataHutangVendor" wire:loading.attr="disabled">
                            <span wire:loading.attr="dataHutangVendor">Generate PDF</span>
                            <div wire:loading wire:target="dataHutangVendor">
                                Downloading Report...
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Data Hutang Agent</h5>
                </div>
                <div class="card-body">
                    <div>
                        <button class="btn btn-primary" wire:click="dataHutangAgent" wire:loading.attr="disabled">
                            <span wire:loading.attr="dataHutangAgent">Generate PDF</span>
                            <div wire:loading wire:target="dataHutangAgent">
                                Downloading Report...
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Laporan Gaji Karyawan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h6 class="font-weight-semibold">Tanggal Mulai</h6>
                                <input type="date" wire:model="d_awal" class="form-control typeahead-basic"
                                    placeholder="States of USA">
                                @error('d_awal')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h6 class="font-weight-semibold">Tanggal Sampai</h6>
                                <input type="date" wire:model="d_akhir" class="form-control typeahead-basic"
                                    placeholder="States of USA">
                                @error('d_akhir')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary" wire:click="laporanGaji" wire:loading.attr="disabled">
                                <span wire:loading.attr="laporanGaji">Generate PDF</span>
                                <div wire:loading wire:target="laporanGaji">
                                    Downloading Report...
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
