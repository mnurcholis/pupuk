<?php

namespace App\Livewire\Admin\Pages\Operasional;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Operasional;

class DataOpersionalTable extends DataTableComponent
{
    protected $model = Operasional::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Nama", "name")
                ->sortable()->searchable(),
            Column::make("Total", "total")
                ->sortable()->searchable()
                ->format(
                    function ($value, $row, Column $column) {
                        return 'Rp. ' . number_format($row->total, 0, ',', '.');
                    }
                )
                ->html(),
            Column::make("Keterangan", "keterangan")
                ->sortable()->searchable(),
            Column::make('Action', 'id')->view('components.table-action'),
        ];
    }
}
