<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\orders as order;

class halfHour extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'half:hourchs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Раз в 30 минут собираем все заказы со статусом accepted и меняем на статус shipping';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        order::where('status', 'accepted')->update(['status' => 'shipping']);
        $this->info('Команда создана');
        return Command::SUCCESS;
    }
}
