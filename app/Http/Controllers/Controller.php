<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($message, $data = null):JsonResponse
    {
        $response = [
            'code' => 200,
            'status' => "success",
            'message' => $message,
        ];
        if ($data) {
            $response['data'] = $data;
        }
        return response()->json($response);
    }

    public function sendError($message):JsonResponse
    {
        $response = [
            'code' => 400,
            'status' => "failed",
            'message' => $message,
        ];
        return response()->json($response);
    }

    public function sendNoDataResponse($message, $data = null):JsonResponse
    {
        $response = [
            'code' => 404,
            'status' => "No Data Exist",
            'message' => $message,
        ];
        if ($data) {
            $response['data'] = $data;
        }
        return response()->json($response);
    }

    public function sendInternalServerError():JsonResponse
    {
        $response = [
            'code' => 500,
            'status' => "Internal Server Error",
        ];
        return response()->json($response);
    }

    public function sendCreatedResponse($message, $data = null):JsonResponse
    {
        $response = [
            'code' => 201,
            'status' => "success",
            'message' => $message,
        ];
        if ($data) {
            $response['data'] = $data;
        }
        return response()->json($response);
    }
}