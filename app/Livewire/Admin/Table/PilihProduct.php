<?php

namespace App\Livewire\Admin\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;

class PilihProduct extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function PilihProduct($user_id)
    {
        $this->emit('SelectProduct', $user_id);
    }

    public function columns(): array
    {
        return [
            Column::make("Nama", "name")
                ->sortable()->searchable(),
            Column::make("Beli", "harga_beli")
                ->hideIf(!auth()->user()->hasRole('admin'))
                ->sortable()->searchable()
                ->format(
                    function ($value, $row, Column $column) {
                        return 'Rp. ' . number_format($row->harga_beli, 0, ',', '.');
                    }
                )
                ->html(),
            Column::make("Jual", "harga_jual")
                ->sortable()->searchable()
                ->format(
                    function ($value, $row, Column $column) {
                        return 'Rp. ' . number_format($row->harga_jual, 0, ',', '.');
                    }
                )
                ->html(),
            Column::make("Qty", "qty")
                ->sortable()->searchable(),
            Column::make("Total", "total")
                ->sortable()->searchable()
                ->format(
                    function ($value, $row, Column $column) {
                        return 'Rp. ' . number_format($row->total, 0, ',', '.');
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
