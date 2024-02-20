<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\ContentService;

class ContentController extends BaseController
{
    protected $content;

    /**
     * Initialize Content
     *
     * @param ContentService $content
     */
    public function __construct(ContentService $content)
    {
        $this->content = $content;
    }

    /**
     * Header options set to API
     *
     * @return object
     */
    public function header(): object
    {
        $data = [
            ['title' => 'about-us', 'possessive' => true],
            ['title' => 'contact',  'possessive' => true],
            ['title' => 'announcement', 'possessive' => true ],
            ['title' => 'Travel blogs',    'possessive' => true],
            ['title' => 'Privacy policy', 'possessive' => true]
        ];
        return $this->response->setJSON($data);
    }

    /**
     * Fetch the content of pages according to title
     *
     * @param [type] $title
     * @return object
     */
    public function getContent($title) :object
    {
        if($title == 'Travel blogs'){
            $blogs = [];
            return $this->response->setJSON(['data' => $blogs, 'status' => 200]);
        }else{
            $data = [];
            return $this->response->setJSON(['data' => $data, 'status' => 200]);
        }
    }

    /**
     * Application logo API
     *
     * @return string
     */
    public function applicationLogo(): string
    {
        $data['logo_url'] = base_url('logo/logo.png');
        return $this->response->setJSON($data);
    }

}
