<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LineLiffController extends Controller
{
    public function callback()
    {
        return response->json([]);
    }
}