<?php

namespace NothingWorks\DiskMonitor\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \NothingWorks\DiskMonitor\DiskMonitor
 */
class DiskMonitor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \NothingWorks\DiskMonitor\DiskMonitor::class;
    }
}
