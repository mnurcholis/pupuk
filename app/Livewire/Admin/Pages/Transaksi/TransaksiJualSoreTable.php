<?php

namespace App\Livewire\Admin\Pages\Transaksi;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\TransaksiJualSore;

class TransaksiJualSoreTable extends DataTableComponent
{
    protected $model = TransaksiJualSore::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Agent", "agent.name"),
            Column::make("Invoice", "invoice")
                ->sortable(),
            Column::make("Tanggal", "tanggal")
                ->sortable(),
            Column::make('Total', 'total')
                ->format(
                    function ($value, $row, Column $column) {
                        return number_format($row->total, 0, ',', '.');
                    }
                )
                ->html(),
            Column::make('Bayar', 'bayar')
                ->format(
                    function ($value, $row, Column $column) {
                        return number_format($row->bayar, 0, ',', '.');
                    }
                )
                ->html(),
            Column::make('Hutang', 'sisa')
                ->format(
                    function ($value, $row, Column $column) {
                        return number_format($row->sisa, 0, ',', '.');
                    }
                )
                ->html(),
            Column::make('Action', 'id')
                ->format(
                    function ($value, $row, Column $column) {
                        return '
                        <button type="button" class="btn btn-outline-info btn-sm" wire:click="Detail(' . $row->id . ')")"><i class="icon-eye"></i></button>
                        <button type="button" class="btn btn-outline-success btn-sm" wire:click="CetakInvoice(' . $row->invoice . ')")"><i class="icon-printer"></i></button>
                        <button type="button" class="btn btn-outline-primary btn-sm" wire:click="ConfirmBatal(' . $row->id . ')")"><i class="icon-stack-cancel"></i> Batal</button>
                        ';
                    }
                )
                ->html(),
        ];
    }
}
