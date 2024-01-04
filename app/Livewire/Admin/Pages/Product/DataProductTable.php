<?php

namespace App\Livewire\Admin\Pages\Product;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;

class DataProductTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Nama", "name")
                ->sortable()->searchable(),
            Column::make("Beli", "harga_beli")
                ->sortable()->searchable(),
            Column::make("Jual", "harga_jual")
                ->sortable()->searchable(),
            Column::make("Qty", "qty")
                ->sortable()->searchable(),
            Column::make("Total", "total")
                ->sortable()->searchable(),
            Column::make('Action', 'id')->view('components.table-action'),
        ];
    }
}
