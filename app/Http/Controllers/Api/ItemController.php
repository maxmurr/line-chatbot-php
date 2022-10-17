<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
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

class ItemController extends Controller
{

    public function index()
    {
        return Item::all();
    }

    public function store(Request $request){
        return item::create($request->all());
        if($item->save()){
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env('LINE_ACCESS_TOKEN'));
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env('LINE_CHANNEL_SECRET')]);

            $userId = 'U975203f455a4ccea0895697498dbe776';
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
            $response = $bot->pushMessage($userId, $textMessageBuilder);     
        }
    }

    public function show(Item $item)
    {
        return $item;
    }
}
