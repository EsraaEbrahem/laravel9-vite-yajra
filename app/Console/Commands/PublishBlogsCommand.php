<?php

namespace App\Console\Commands;

use App\Enums\BlogStatus;
use App\Jobs\BlogPublish;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PublishBlogsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publish:blogs';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        BlogPublish::dispatch();
        return Command::SUCCESS;
    }
}
