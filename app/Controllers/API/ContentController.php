<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\ContentService;
use App\Models\Settings;

class ContentController extends BaseController
{
    protected $content;

    protected $settings;
    /**
     * Initialize Content
     *
     * @param ContentService $content
     */
    public function __construct()
    {
        $this->content  = new ContentService();
        $this->settings = new Settings();
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
            $blogs = $this->content->blogsList();
            return $this->response->setJSON(['data' => $blogs, 'status' => 200]);
        }else{
            $data = $this->content->getContent($title);
            return $this->response->setJSON(['data' => $data, 'status' => 200]);
        }
    }

    /**
     * Application logo API
     *
     * @return string
     */
    public function applicationLogo(): object
    {
        $logo = $this->settings->getLogo();
        $data['logo_url'] = base_url($logo);
        return $this->response->setJSON($data);
    }

}
