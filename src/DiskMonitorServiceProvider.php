<?php

namespace NothingWorks\DiskMonitor;

use NothingWorks\DiskMonitor\Commands\RecordDiskMetricsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DiskMonitorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('disk-monitor')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_disk_metrics_table')
            ->hasCommand(RecordDiskMetricsCommand::class);
    }
}
