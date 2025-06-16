<?php

namespace App\Console\Commands;

use App\Notification;
use App\V1\Client\Client;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ContractNotifications extends Command
{
    protected $signature = 'send:contract-notifications';

    protected $description = 'Send notification to users who registered 14 days ago';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $clients = Client::whereDate('created_at', '>=', Carbon::now()->subDays(14)->toDateString())
                ->whereDate('created_at', '<=', Carbon::now()->subDays(10)->toDateString())
                ->whereDoesntHave('clientdocuments', function ($query) {
                    $query->where('ClientDocumentType', 'CONTRACT');
                })
                ->where('ClientStatus', 'ACTIVE')
                ->get();

            $body = 'Please send the contract before 14 days from your registration date.';
            $title = 'Reminder';

            foreach ($clients as $client) {
                sendFirebaseNotification($client, [], $title, $body);
            }

        } catch (\Exception $e) {
            Log::error("Exception occurred: " . $e->getMessage());
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    }
}
