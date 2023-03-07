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

        $newContact = [
            'FirstName' => $this->request->param('firstName'),
            'LastName' => $this->request->param('lastName'),
            'Phone' => $this->request->param('userPhone'),
        ];

        // check if contact phone number already exist
        if ($this->contactModel->has(['Phone' => $this->request->param('userPhone')]))
            return json(
                [
                    'status' => 'error',
                    'message' => 'Phone number already exist!'
                ]
            );

        $contactID = $this->contactModel->create($newContact);

        if ($contactID > 0) return json(
            [
                'status' => 'OK',
                'message' => 'Contact added'
            ]
        );

        return json(
            [
                'status' => 'error',
                'message' => 'Something went wrong!'
            ]
        );
    }
}
