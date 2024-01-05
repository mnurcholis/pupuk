<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Transaksi" subjudul="Barang Datang" :breadcrumb="['Transaksi Barang Datang']" />
    </x-slot>
    <div class="card">
        <div class="card-header">
            @if ($isEdit)
                <a href="#" wire:click='cancel' class="btn btn-warning mt-md-0 mt-2 ml-md-8">Cancel</a>
            @else
                <a href="#" wire:click='add' class="btn btn-primary mt-md-0 mt-2">Tambah Barang Datang</a>
            @endif

        </div>
        <div class="card-body">
            @if ($isEdit)
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <div class="form-group">
                            <label>Pilih Product:</label><br>
                            <button class="btn btn-primary btn-sm" wire:click="pilihProduct"
                                type="button">Pilih</button>
                        </div>
                    </div>
                    <div class="col-md-3 pl-0 pr-0">
                        <div class="form-group">
                            <label>Nama Product:</label>
                            <input type="text"
                                class="form-control {{ $errors->has('product_id') ? ' border-danger' : null }}"
                                value="{{ $product->name ?? '' }}" disabled>
                            @error('product_id')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1 pl-0 pr-0">
                        <div class="form-group">
                            <label>Jual:</label>
                            <input type="text"
                                class="form-control {{ $errors->has('product_id') ? ' border-danger' : null }}"
                                value="{{ $product->harga_jual ?? '' }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-1 pl-0 pr-0">
                        <div class="form-group">
                            <label>Satuan:</label>
                            <input type="text"
                                class="form-control {{ $errors->has('product_id') ? ' border-danger' : null }}"
                                wire:model="satuan" disabled>
                        </div>
                    </div>
                    <div class="col-md-2 pl-0 pr-0">
                        <div class="form-group">
                            <label>Harga Beli:</label>
                            <input type="number"
                                class="form-control {{ $errors->has('harga_beli') ? ' border-danger' : null }}"
                                wire:model="harga_beli">
                            @error('harga_beli')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1 pl-0 pr-0">
                        <div class="form-group">
                            <label>QTY:</label>
                            <input type="number"
                                class="form-control {{ $errors->has('qty') ? ' border-danger' : null }}"
                                wire:model="qty">
                            @error('qty')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2 pl-0">
                        <div class="form-group">
                            <label>Sub Total:</label>
                            <input type="number"
                                class="form-control {{ $errors->has('sub_total') ? ' border-danger' : null }}"
                                wire:model="sub_total">
                            @error('sub_total')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" wire:click='tambahProduct'
                            class="btn btn-info btn-sm form-control">Tambah</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-table table-responsive shadow-0 mb-0 mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Harga Beli</th>
                                        <th>Qty</th>
                                        <th>Sub Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_add_product as $a)
                                        <tr>
                                            <td>{{ $a['id'] }}</td>
                                            <td>{{ $a['name'] }}</td>
                                            <td>{{ $a['harga_beli'] }}</td>
                                            <td>{{ $a['qty'] }}</td>
                                            <td>{{ $a['sub_total'] }}</td>
                                            <td><button type="button"
                                                    class="btn bg-pink-400 btn-icon rounded-round btn-sm"
                                                    wire:click="hapusProduct({{ $a['id'] }},{{ $a['sub_total'] }})"><i
                                                        class="icon-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        @php
                                            $jumlah += $a['qty'];
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="3"></td>
                                        <td><b>{{ $jumlah }}</b></td>
                                        <td><b>{{ $total }}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label class="col-form-label col-lg-2">Vendor</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Pilih Vendor"
                                value="{{ $vendor->name ?? '' }}">
                            <span class="input-group-append">
                                <button class="btn bg-teal" type="button" wire:click="pilihVendor">Pilih</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Total</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="{{ $total }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Bayar</label>
                    <div class="col-lg-10">
                        <input type="number" class="form-control" wire:model="bayar">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Sisa</label>
                    <div class="col-lg-10">
                        <input type="number" class="form-control" wire:model="sisa" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" wire:click='Transaksi'
                            class="btn btn-success btn-sm form-control">Transaksi</button>
                    </div>
                </div>
            @else
                <livewire:admin.pages.karyawan.gaji-karyawan-table />
            @endif
        </div>
    </div>
    <livewire:admin.global.konfirmasi-hapus />
    <div wire:ignore.self class="modal fade" id="SelectUserPemohon" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a href="{{ route('dataproduct') }}" class="btn btn-primary">Tambah Product</a>
                    <hr>
                    <livewire:admin.table.pilih-product />
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="SelectVendor" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Vendor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <livewire:admin.table.pilih-vendor />
                </div>
            </div>
        </div>
    </div>
</div>


@push('js')
    <script src="{{ asset('limitless/global_assets/js/demo_pages/form_checkboxes_radios.js') }}"></script>
    <script>
        $(document).ready(function() {
            window.addEventListener('show-select-user-modal', event => {
                $('#SelectUserPemohon').modal('show');
            });

            window.addEventListener('close-select-user-modal', event => {
                $('#SelectUserPemohon').modal('hide');
            });

            window.addEventListener('show-select-vendor-modal', event => {
                $('#SelectVendor').modal('show');
            });

            window.addEventListener('close-select-vendor-modal', event => {
                $('#SelectVendor').modal('hide');
            });
        });
    </script>
@endpush
