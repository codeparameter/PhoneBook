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

    private function findContact($contactID)
    {
        if(!is_numeric($contactID))
            return json(
                [
                    'status' => 'error',
                    'message' => 'Contact ID must be integer'
                ]
            );
        elseif($contactID <= 0)
            return json(
                [
                    'status' => 'error',
                    'message' => 'Contact ID must be greater than 0'
                ]
            );

        $contact = $this->contactModel->find($contactID);
        
        if(is_null($contact))
        return json(
            [
                'status' => 'error',
                'message' => 'Wrong Contact ID!'
            ]
        );

        return $contact;
    }

    public function editContact($contactID)
    {
        $contact = $this->findContact($contactID);
        $contact->FistName = $this->request->param('firstName');
        $contact->LastName = $this->request->param('lastName');
        $contact->Phone = $this->request->param('userPhone');
        $contact->save();
        return json(
            [
                'status' => 'OK',
                'message' => 'Contact edited'
            ]
        );
    }

    public function editView($contactID)
    {
        $contact = $this->findContact($contactID);
        view('editContact', $contact->getAttrs());
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
