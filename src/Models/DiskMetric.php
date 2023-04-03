<?php

namespace NothingWorks\DiskMonitor\Models;

use Illuminate\Database\Eloquent\Model;

class DiskMetric extends Model
{
    protected $fillable = [
        'disk_name',
        'file_count',
    ];

    public static function last(): ?self
    {
        return static::query()->latest('id')->first();
    }
}
