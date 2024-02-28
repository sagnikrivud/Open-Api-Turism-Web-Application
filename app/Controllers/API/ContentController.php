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
            ['title' => 'about-us', 'possessive' => true, 'order' => 1],
            ['title' => 'contact',  'possessive' => true, 'order' => 2],
            ['title' => 'announcement', 'possessive' => true, 'order' => 3 ],
            ['title' => 'Travel blogs',    'possessive' => true, 'order' => 4],
            ['title' => 'Privacy policy', 'possessive' => true, 'order' => 5]
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
        $data['application'] = $this->settings->getSettingsById(1);
        $data['logo_url'] = base_url($logo);
        return $this->response->setJSON($data);
    }

}
