<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class StoreViewCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storeviewcount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $storage = Redis::connection();

        $cached_data = $storage->zRevRange('articleViews', 0, -1);

        foreach ($cached_data as $key => $value) {
            $id = str_replace('article:', '', $value);

            $views = $storage->get('article:' . $id . ':views');

            $article = Blog::findOrFail($id);
            $article->view = $views;
            $article->save();
        }
        //$storage->flushAll();

        $this->line('View score stored successfully.');
    }
}
