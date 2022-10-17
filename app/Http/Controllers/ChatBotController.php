<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\Exception\InvalidEventRequestException;
use LINE\LINEBot\Exception\InvalidSignatureException;
use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class ChatBotController extends Controller
{
    public function webhook(Request $request){
        {
            Log::info($request);
    
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env('LINE_ACCESS_TOKEN'));
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env('LINE_CHANNEL_SECRET')]);
    
            foreach ($request['events'] as $event) {
                if ($event['message']['type'] == 'text' && $event['message']['text'] == 'give me 10 scores') {
                    $post = Item::inRandomOrder()->first();
                    $response = $bot->replyText($event['replyToken'], json_encode($post));
                }
    
                if ($event['message']['type'] == 'sticker') {
                    $response = $bot->replyText($event['replyToken'], 'package_Id = '
                        . $event['message']['packageId']
                        . ' and'
                        . ' stickerId = '
                        .$event['message']['stickerId']);
                }
            }
    
            return response()->json([]);
    
        }
    }
}
