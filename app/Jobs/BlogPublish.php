<?php

namespace App\Jobs;

use App\Enums\BlogStatus;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BlogPublish implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /**
         * update blog status based on publish date
         */
        $now = Carbon::now();
        $date = Carbon::parse($now)->toDateTimeString();

        Blog::where('status', BlogStatus::DRAFT)
            ->where('publish_date', '<=', $date)
            ->update([
                'status' => BlogStatus::PUBLISHED
            ]);
    }
}
