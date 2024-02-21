<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\ReviewService;

class ReviewController extends BaseController
{
    /**
     * Submit review from APP end via API
     *
     * @return void
     */
    public function postReview()
    {
        if ($this->request->getMethod() === 'post'){
            //  Add service
        }
    }
}
