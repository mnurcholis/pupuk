<?php

namespace App\Livewire\Admin\Pages\Transaksi;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\TransaksiJualPagi;

class TransaksiJualPagiTable extends DataTableComponent
{
    protected $model = TransaksiJualPagi::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'DESC');
    }

    public function Detail($id)
    {
        $this->emit('Detail', $id);
    }

    public function CetakInvoice($invoice)
    {
        $this->emit('CetakInvoice', $invoice);
    }

    public function ConfirmBatal($id)
    {
        $this->emit('ConfirmBatal', $id);
    }

    public function columns(): array
    {
        return [
            Column::make("Agent", "agent.name"),
            Column::make("Invoice", "invoice")
                ->sortable()->searchable(),
            Column::make("Tanggal", "tanggal")
                ->sortable()->searchable(),
            Column::make('Total', 'total')
                ->format(
                    function ($value, $row, Column $column) {
                        return 'Rp. ' . number_format($row->total, 0, ',', '.');
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
