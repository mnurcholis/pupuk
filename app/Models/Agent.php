<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Agent extends Model implements Auditable
{
    use HasFactory;

    use AuditableTrait;

    protected $guarded = [];

    public function comcode()
    {
        return $this->belongsTo(ComCode::class, 'status', 'code_cd');
    }

    public function transaksi_pagi()
    {
        return $this->belongsTo(TransaksiJualPagi::class, 'id', 'agent_id');
    }
}
