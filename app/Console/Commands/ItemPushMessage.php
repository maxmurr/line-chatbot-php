<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\LineWebHookController;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class ItemPushMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push:message {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Push message to LINE';

    /**
     * Execute the console command.
     *
     * @return int
     */

     // push message to LINE using LINE Messaging API https://api.line.me/v2/bot/message/push
     public function handle()
     {
        $userId = $this->argument('userId');

        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env('LINE_ACCESS_TOKEN'));
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env('LINE_CHANNEL_SECRET')]);

        $packageId = 8522;
        $stickerId = 16581266;

        $multiMessageBuilder = new MultiMessageBuilder();
        $multiMessageBuilder->add(new StickerMessageBuilder($packageId, $stickerId));
        $response = $bot->pushMessage($userId, $multiMessageBuilder);
    }
}