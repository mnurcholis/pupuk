<?php

namespace App\Livewire\Admin\Pages\Transaksi;

use App\Models\Product;
use App\Models\TransaksiBeli as ModelsTransaksiBeli;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TransaksiBeli extends Component
{
    public $idNya, $product_id, $product, $harga_beli, $qty, $sub_total, $satuan, $list_add_product = [], $jumlah = 0, $total = 0, $vendor_id, $vendor, $bayar = 0, $sisa;
    public $isEdit = true;

    protected $listeners = ['SelectProduct', 'SelectVendor', 'edit', 'delete'];

    public function add()
    {
        $this->isEdit = !$this->isEdit;
    }

    public function cancel()
    {
        $this->isEdit = !$this->isEdit;
        $this->idNya = null;
    }

    public function updatedHargaBeli()
    {
        $this->sub_total = $this->qty * $this->harga_beli;
    }

    public function updatedQty()
    {
        $this->sub_total = $this->qty * $this->harga_beli;
    }

    public function tambahProduct()
    {
        $rules['product_id'] = 'required';
        $rules['harga_beli'] = 'required';
        $rules['qty'] = 'required';
        $rules['sub_total'] = 'required';
        $this->validate($rules);

        // Check if the product with the same ID already exists in the list
        $existingProductIndex = array_search($this->product_id, array_column($this->list_add_product, 'product_id'));

        if ($existingProductIndex !== false) {
            // If the product already exists, update quantity, harga_beli, and sub_total
            $this->list_add_product[$existingProductIndex]['qty'] += $this->qty;
            $this->list_add_product[$existingProductIndex]['harga_beli'] = $this->harga_beli;
            $this->total = $this->total - $this->list_add_product[$existingProductIndex]['sub_total'];
            $this->list_add_product[$existingProductIndex]['sub_total'] = $this->list_add_product[$existingProductIndex]['qty'] * $this->harga_beli;
            $this->total += $this->list_add_product[$existingProductIndex]['sub_total'];
        } else {
            // If the product doesn't exist, add it to the list
            $maxId = count($this->list_add_product) > 0 ? max(array_column($this->list_add_product, 'id')) : 0;
            $newProduct = [
                'id' => $maxId + 1,
                'product_id' => $this->product_id,
                'name' => $this->product->name,
                'harga_beli' => $this->harga_beli,
                'qty' => $this->qty,
                'sub_total' => $this->qty * $this->harga_beli,
            ];
            $this->list_add_product[] = $newProduct;
            $this->total += $this->sub_total;
        }

        // Reset properties
        $this->product_id = null;
        $this->product = null;
        $this->harga_beli = null;
        $this->qty = null;
        $this->sub_total = null;
        $this->satuan = null;
    }

    public function hapusProduct($id, $kurang)
    {
        $this->total = $this->total - $kurang;
        $this->list_add_product = array_filter($this->list_add_product, function ($item) use ($id) {
            return $item['id'] !== $id;
        });
    }

    public function updatedBayar()
    {
        if ($this->bayar == '') {
            $this->sisa = $this->total;
        } else {
            $this->sisa = $this->total - $this->bayar;
        }
    }

    public function updatedTotal()
    {
        if ($this->bayar == '') {
            $this->sisa = $this->total;
        } else {
            $this->sisa = $this->total - $this->bayar;
        }
    }

    public function edit($id)
    {
        $this->isEdit = true;
        $data = ModelsTransaksiBeli::find($id);
        $this->idNya = $data->id;
    }
    public function save()
    {
        $rules['karyawan_id'] = 'required';
        $rules['gaji'] = 'required';
        $rules['kategori'] = 'required';
        $this->validate($rules);
        if ($this->idNya) {
            $this->update();
        } else {
            ModelsTransaksiBeli::create([
                'karyawan_id' => $this->karyawan_id,
                'gaji' => $this->gaji,
                'bonus' => $this->bonus,
                'kategori' => $this->kategori,
            ]);
            $this->emit('refreshDatatable');
            $this->cancel();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success', // Jenis alert, misalnya 'success', 'error', atau 'warning'
                'text' => 'Karyawan Berhasil di Tambahkan...', // Isi pesan
            ]);
        }
    }
    public function update()
    {
        $dataUser = ModelsTransaksiBeli::find($this->idNya);
        $dataUser->karyawan_id = $this->karyawan_id;
        $dataUser->gaji = $this->gaji;
        $dataUser->bonus = $this->bonus;
        $dataUser->kategori = $this->kategori;
        $dataUser->save();
        $this->emit('refreshDatatable');
        $this->cancel();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success', // Jenis alert, misalnya 'success', 'error', atau 'warning
            'text' => 'Gaji Berhasil di perbaharui...', // Isi pesan
        ]);
    }

    public function delete($id)
    {
        $this->idNya = $id;
        try {
            DB::transaction(function () {
                $user = ModelsTransaksiBeli::find($this->idNya);
                $user->delete();
            });
            $this->emit('refreshDatatable');
            $this->idNya = '';
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success', // Jenis alert, misalnya 'success', 'error', atau 'warning
                'text' => 'Gaji Berhasil dihapus...', // Isi pesan
            ]);
        } catch (\Exception $e) {
            $this->emit('refreshDatatable');
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error', // Jenis alert, misalnya 'success', 'error', atau 'warning
                'text' => 'Gaji Tidak dapat dihapus...', // Isi pesan
            ]);
        }
    }

    public function pilihVendor()
    {
        $this->dispatchBrowserEvent('show-select-vendor-modal');
    }

    public function SelectVendor($id)
    {
        $this->vendor_id = $id;
        $this->vendor = Vendor::find($id);
        $this->dispatchBrowserEvent('close-select-vendor-modal');
    }

    public function pilihProduct()
    {
        $this->dispatchBrowserEvent('show-select-user-modal');
    }

    public function SelectProduct($id)
    {
        $this->product_id = $id;
        $this->product = Product::find($id);
        $this->harga_beli = $this->product->harga_beli;
        $this->satuan = $this->product->satuan;
        $this->dispatchBrowserEvent('close-select-user-modal');
    }

    public function render()
    {
        return view('livewire.admin.pages.transaksi.transaksi-beli');
    }
}
