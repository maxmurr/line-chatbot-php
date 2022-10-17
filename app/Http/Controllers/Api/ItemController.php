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
use App\Http\Controllers\LineWebHookController;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use Illuminate\Console\Command;

class ItemController extends Controller
{

    public function index()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        return Item::create($request->all());

        Artisan::call('push:message', [
            'userId' => 'U1e25a7ce8e3e826b9aa5899adc321a67'
        ]);

            //$userId = 'U1e25a7ce8e3e826b9aa5899adc321a67';
    }

    public function show(Item $item)
    {
        return $item;
    }
}
