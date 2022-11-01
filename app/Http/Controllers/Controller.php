<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function response($code, $message, $data = null)
    {
        $arr = [
            'code' => $code,
            'message' => $message,
        ];

        if ($data != null) $arr['data'] = $data;

        return response()->json($arr, $code);
    }
}
