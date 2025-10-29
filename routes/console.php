<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::command('zoomos:import-categories')
    ->dailyAt('01:00')
    ->withoutOverlapping()
    ->runInBackground();

Schedule::command('zoomos:import-brands')
    ->dailyAt('02:00')
    ->withoutOverlapping()
    ->runInBackground();

Schedule::command('zoomos:import-characteristics')
    ->dailyAt('03:00')
    ->withoutOverlapping()
    ->runInBackground();

Schedule::command('zoomos:import-create')
    ->dailyAt('04:00')
    ->withoutOverlapping()
    ->runInBackground();

Schedule::command('zoomos:import-update')
    ->hourly()
    ->withoutOverlapping()
    ->runInBackground();