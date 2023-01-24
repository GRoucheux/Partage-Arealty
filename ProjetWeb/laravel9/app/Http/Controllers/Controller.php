<?php

namespace App\Http\Controllers;
/**
 * @OA\Info(
 *    title="YAWL Api Documentation",
 *    version="1.0.0",
 * )
 */class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}