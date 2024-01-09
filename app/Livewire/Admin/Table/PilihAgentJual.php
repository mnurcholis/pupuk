<?php

namespace App\Livewire\Admin\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\TransaksiJualPagi;
use Illuminate\Database\Eloquent\Builder;

class PilihAgentJual extends DataTableComponent
{
    protected $model = TransaksiJualPagi::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return TransaksiJualPagi::where('tanggal', date('Y-m-d'));
    }
    public function PilihAgent($user_id)
    {
        $this->emit('SelectAgent', $user_id);
    }

    public function columns(): array
    {
        return [
            Column::make("INVOICE", "invoice")
                ->sortable()->searchable(),
            Column::make("Nama", "agent.name")
                ->sortable()->searchable(),
            Column::make("Nomor", "agent.number")
                ->sortable()->searchable(),
            Column::make("Alamat", "agent.address")
                ->sortable()->searchable(),
            Column::make('Action', 'id')
                ->format(
                    function ($value, $row, Column $column) {
                        return '<button href="#" class="btn btn-primary" wire:click="PilihAgent(' . $row->id . ')")">Pilih</button>';
                    }
                )
                ->html(),
        ];
    }
}
