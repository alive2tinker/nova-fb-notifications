<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Kutia\Larafirebase\Facades\Larafirebase;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

 Route::post('/send', function (Request $request) {
     $deviceTokens = array_column(DB::select(DB::raw("SELECT token from notification_tokens")), 'token');
     $result = Larafirebase::withTitle($request->input('title'))
         ->withBody($request->input('body'))
         ->withImage('https://cdn-icons-png.flaticon.com/512/815/815252.png')
         ->withIcon('https://seeklogo.com/images/F/firebase-logo-402F407EE0-seeklogo.com.png')
         ->withSound('default')
         ->withClickAction($request->input('clickAction') ?? null)
         ->withPriority($request->input('priority'))
         ->withAdditionalData([
             'link' => "https://google.com"
         ])
         ->sendNotification($deviceTokens);

     return response()->json([
         'device-tokens' => $deviceTokens,
         'result' => $result
     ]);
 });
