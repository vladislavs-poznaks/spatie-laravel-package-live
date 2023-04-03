<?php

namespace NothingWorks\DiskMonitor\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use NothingWorks\DiskMonitor\Models\DiskMetric;

class RecordDiskMetricsCommand extends Command
{
    public $signature = 'disk-monitor:record';

    public $description = 'Record the metrics of disk';

    public function handle(): int
    {
        $this->comment('Recording metrics...');

        $diskName = config('disk-monitor.disk-name');

        $fileCount = count(Storage::disk($diskName)->allFiles());

        DiskMetric::create([
            'disk_name' => $diskName,
            'file_count' => $fileCount
        ]);

        $this->comment('All done!');

        return self::SUCCESS;
    }
}
