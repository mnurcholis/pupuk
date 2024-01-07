<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Dashboard" subjudul="Dasboard" :breadcrumb="[]" />
    </x-slot>

    <div class="card card-body">
        <div class="row text-center">
            <div class="col-md-1">
                <p><i class="icon-users4 icon-2x d-inline-block text-primary"></i></p>
                <h5 class="font-weight-semibold mb-0">{{ $karyawan->count() }}</h5>
                <span class="text-muted font-size-sm">Karyawan</span>
            </div>

            <div class="col-md-1">
                <p><i class="icon-collaboration icon-2x d-inline-block text-warning"></i></p>
                <h5 class="font-weight-semibold mb-0">{{ $agent->count() }}</h5>
                <span class="text-muted font-size-sm">Agent</span>
            </div>

            <div class="col-md-1">
                <p><i class="icon-accessibility icon-2x d-inline-block text-info"></i></p>
                <h5 class="font-weight-semibold mb-0">{{ $vendor->count() }}</h5>
                <span class="text-muted font-size-sm">Vendor</span>
            </div>

            <div class="col-md-1">
                <p><i class="icon-store2 icon-2x d-inline-block text-success"></i></p>
                <h5 class="font-weight-semibold mb-0">{{ $product->count() }}</h5>
                <span class="text-muted font-size-sm">Product</span>
            </div>

            <div class="col-md-1">
                <p><i class="icon-stack3 icon-2x d-inline-block text-danger"></i></p>
                <h5 class="font-weight-semibold mb-0">{{ $product->sum('qty') }}</h5>
                <span class="text-muted font-size-sm">Total Stok</span>
            </div>

            <div class="col-2">
                <p><i class="icon-cash2 icon-2x d-inline-block text-warning"></i></p>
                <h5 class="font-weight-semibold mb-0">Rp, {{ number_format($pengeluaran, 0, ',', '.') }}</h5>
                <span class="text-muted font-size-sm">Pengeluaran</span>
            </div>

            <div class="col-2">
                <p><i class="icon-cash2 icon-2x d-inline-block text-primary"></i></p>
                <h5 class="font-weight-semibold mb-0">Rp, {{ number_format($pemasukan->sum('bayar'), 0, ',', '.') }}
                </h5>
                <span class="text-muted font-size-sm">Pemasukan</span>
            </div>
        </div>
    </div>
</div>
