<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class SampleController extends Controller
{
    public function __invoke()
    {
        sleep(2);
        return response()->json(['data' => 'datanonakami']);
    }
}
