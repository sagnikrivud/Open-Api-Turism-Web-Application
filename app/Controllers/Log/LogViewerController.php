<?php

namespace App\Controllers\Log;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CILogViewer\CILogViewer;

class LogViewerController extends BaseController
{
    public function index()
    {
        $logViewer = new CILogViewer();
        return $logViewer->showLogs();
    }
}
