<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\ReviewService;

class ReviewController extends BaseController
{
    /**
     * Initiate Review service
     */
    public function __construct()
    {
        $this->review = new ReviewService();
    }
    /**
     * Submit review from APP end via API
     *
     * @return void
     */
    public function postReview()
    {
        if ($this->request->getMethod() === 'post'){
            $requestBody = $this->request->getBody();
            $request = json_decode($requestBody, true);
            $data = $this->review->submitReview($request);
            return $this->response->setJSON(['message' => $data, 'status' => 200]);
        }
    }
}
