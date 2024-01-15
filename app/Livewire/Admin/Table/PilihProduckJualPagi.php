<?php

namespace App\Livewire\Admin\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\TransaksiJualPagiDetail;
use Illuminate\Database\Eloquent\Builder;

class PilihProduckJualPagi extends DataTableComponent
{
    public $transaksi;

    protected $model = TransaksiJualPagiDetail::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return TransaksiJualPagiDetail::where('transaksi_jual_pagi_id', $this->transaksi);
    }

    public function PilihProduct($id)
    {
        $this->emit('SelectProduct', $id);
    }

    public function columns(): array
    {
        return [
            Column::make("Nama", "product.name")
                ->sortable()->searchable(),
            Column::make("Beli", "harga_beli")
                ->sortable()->searchable()
                ->format(
                    function ($value, $row, Column $column) {
                        return number_format($row->harga_beli, 0, ',', '.');
                    }
                )
                ->html(),
            Column::make("Jual", "harga_jual")
                ->sortable()->searchable()
                ->format(
                    function ($value, $row, Column $column) {
                        return number_format($row->harga_jual, 0, ',', '.');
                    }
                )
                ->html(),
            Column::make("Qty", "qty")
                ->sortable()->searchable(),
            Column::make("SubTotal", "sub_total")
                ->sortable()->searchable()
                ->format(
                    function ($value, $row, Column $column) {
                        return number_format($row->sub_total, 0, ',', '.');
                    }
                )
                ->html(),
            Column::make('Action', 'id')
                ->format(
                    function ($value, $row, Column $column) {
                        return '<button href="#" class="btn btn-primary" wire:click="PilihProduct(' . $row->id . ')")">Pilih</button>';
                    }
                )
                ->html(),
        ];
    }
}
