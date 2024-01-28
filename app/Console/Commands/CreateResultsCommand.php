<?php

namespace App\Console\Commands;

use App\Models\Game;
use Illuminate\Console\Command;

class CreateResultsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:results';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add results to the matches played in the last 24h';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $games = Game::where('date', '>', date('Y-m-d', strtotime('-24 hours')))->where('host_score', null)->where('guest_score', null)->get();

        foreach ($games as $game) {
            $game->host_score = rand(1, 10);
            $game->guest_score = rand(1, 10);
            $game->save();
        }
    }
}
