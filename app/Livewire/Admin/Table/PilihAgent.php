<?php

namespace App\Livewire\Admin\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Agent;

class PilihAgent extends DataTableComponent
{
    protected $model = Agent::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function PilihAgent($user_id)
    {
        $this->emit('SelectAgent', $user_id);
    }

    public function columns(): array
    {
        return [
            Column::make("Nama", "name")
                ->sortable()->searchable(),
            Column::make("Nomor", "number")
                ->sortable()->searchable(),
            Column::make("Alamat", "address")
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
