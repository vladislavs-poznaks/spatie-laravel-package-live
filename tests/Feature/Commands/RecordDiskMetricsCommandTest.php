<?php

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use NothingWorks\DiskMonitor\Commands\RecordDiskMetricsCommand;
use NothingWorks\DiskMonitor\Models\DiskMetric;
use function Pest\Laravel\artisan;
use function PHPUnit\Framework\assertSame;

beforeEach(function () {
    Storage::fake('local');
});

it('records file count for a disk', function () {

    // No files
    artisan(RecordDiskMetricsCommand::class)
        ->assertExitCode(Command::SUCCESS);

    $lastDiskMetric = DiskMetric::last();
    assertSame(0, $lastDiskMetric->file_count);

    // One file
    Storage::disk('local')->put('test.txt', 'test');

    artisan(RecordDiskMetricsCommand::class)
        ->assertExitCode(Command::SUCCESS);

    $lastDiskMetric = DiskMetric::last();
    assertSame(1, $lastDiskMetric->file_count);
});


