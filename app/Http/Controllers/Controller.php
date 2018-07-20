<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    }

    /**
     * Returns JSON Response for AJAX Requests
     *
     * @param array $data
     * @param array $errors
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function json($data = [], $errors = [], $message = 'OK', $status = 200)
    {
        return response()->json(compact('data', 'errors', 'message'), $status);
    }
}
