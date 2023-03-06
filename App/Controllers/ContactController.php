<?php

namespace App\Controllers;

use App\Models\Contact;

class ContactController{

    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new Contact();
    }

    public function index(){

        $where = ['ORDER' => ['ContactID' => 'DESC']];

        if(isset($_GET['query']))
            $where['OR'] = [
                "FirstName[~]" => $_GET['query'],
                "LastName[~]" => $_GET['query'],
                "Phone[~]" => $_GET['query'],
            ];

        view('index', [
            'contacts' => $this->contactModel->get('*', $where),
        ]);
    }
}