<?php

namespace App\Controllers;

use App\Controllers\Contract\BaseController;
use App\Models\Contact;

class ContactController extends BaseController
{

    private $contactModel;

    public function __construct()
    {
        parent::__construct();
        $this->contactModel = new Contact();
    }

    public function index()
    {

        $where = ['ORDER' => ['ContactID' => 'DESC']];

        if ($this->request->isset('query'))
            $where['OR'] = [
                "FirstName[~]" => $this->request->param('query'),
                "LastName[~]" => $this->request->param('query'),
                "Phone[~]" => $this->request->param('query'),
            ];

        $chunk = $this->contactModel->chunk('*', $where);

        view('index', [
            'currentPage' => $chunk['currentPage'],
            'totalPages' => $chunk['totalPages'],
            'contacts' => $chunk['data'],
        ]);
    }

    public function create()
    {
        // check if contact 
        // $this->contactModel->has(['Phone' => $[]]);
        _global("request")->redirect('');
    }
}
