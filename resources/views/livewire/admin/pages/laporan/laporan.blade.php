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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">LAPORAN DATA DI AGENT ?</h5>
                </div>
                <div class="card-body">
                    <div>
                        @if (session()->has('datadiagent'))
                            <div class="alert alert-warning alert-styled-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold">Warning!</span> {{ session('datadiagent') }}
                            </div>
                        @endif
                        <button class="btn btn-primary" wire:click="LaporanDatadiAgent" wire:loading.attr="disabled">
                            <span wire:loading.attr="LaporanDatadiAgent">Generate PDF</span>
                            <div wire:loading wire:target="LaporanDatadiAgent">
                                Downloading Report...
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">LAPORAN LABA RUGI KESELURUHAN TRANSAKSI ?</h5>
                </div>
                <div class="card-body">
                    <div>
                        @if (session()->has('success'))
                            <div class="alert alert-warning alert-styled-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold">Warning!</span> {{ session('success') }}
                            </div>
                        @endif
                        <button class="btn btn-primary" wire:click="CekLaporan" wire:loading.attr="disabled">
                            <span wire:loading.attr="CekLaporan">Generate PDF</span>
                            <div wire:loading wire:target="CekLaporan">
                                Downloading Report...
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="lanjutCetakLaporan" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-orange">
                    <h5 class="modal-title">Cetak Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><i class="icon-warning22 mr-3 icon-2x text-danger"></i> Ada ketidakseimbangan antara transaksi
                        pembelian dan utang Anda. Mohon cek keuangan dan sesuaikan segera. mau lanjut cetak laporan?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-warning" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn bg-primary" wire:click="laporanKeseluruhan">Ya</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(document).ready(function() {
            window.addEventListener('show-cetak-modal', event => {
                $('#lanjutCetakLaporan').modal('show');
            });

            window.addEventListener('close-cetak-modal', event => {
                $('#lanjutCetakLaporan').modal('hide');
            });
        });
    </script>
@endpush
