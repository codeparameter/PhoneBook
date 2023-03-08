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

    private function contactOperand($contactID, $operator)
    {
        if (!is_numeric($contactID))
            jsonHeader('error', 'Contact ID must be integer');
        elseif ($contactID <= 0)
            jsonHeader('error', 'Contact ID must be greater than 0');

        return $this->contactModel->{$operator}($contactID);
    }

    private function getContact($contactID, $operator)
    {
        return validate_contact(
            $this->contactOperand($contactID, $operator)
        );
    }



    public function editContact($contactID)
    {
        $contact = $this->getContact($contactID, 'find');
        $phone = $this->request->param('userPhone');

        validate_phone($phone);

        $phoneChanged = $contact->Phone != $this->request->param('userPhone');

        if ($phoneChanged) {
            if ($this->contactModel->has(['Phone' => $phone])) {
                jsonHeader('error', 'Phone number already exist!');
            }
        } else {
            if ($this->contactModel->count(['Phone' => $phone]) > 1) {
                jsonHeader('error', 'Phone number already exist!');
            }
        }

        $contact->FistName = $this->request->param('firstName');
        $contact->LastName = $this->request->param('lastName');
        $contact->Phone = $phone;
        $contact->save();
        jsonHeader('OK', 'Contact edited');
    }

    public function editView($contactID)
    {
        $contact = $this->getContact($contactID, 'find');
        view('editContact', $contact->getAttrs());
    }

    public function delete($contactID)
    {
        $delete = $this->contactOperand($contactID, 'deleteOne');
        confirm_delete($delete);
        jsonHeader('OK', 'Contact deleted');
    }

    public function deleteSelected()
    {
        foreach ($this->request->param('contacts') as $contactID)
            $this->contactOperand($contactID, 'deleteOne');
        jsonHeader('OK', 'Contacts deleted');
    }

    public function create()
    {

        $newContact = [
            'FirstName' => $this->request->param('firstName'),
            'LastName' => $this->request->param('lastName'),
            'Phone' => $this->request->param('userPhone'),
        ];

        $phone = $this->request->param('userPhone');

        validate_phone($phone);

        // check if contact phone number already exist
        if ($this->contactModel->has(['Phone' => $phone]))
            jsonHeader('error', 'Phone number already exist!');

        $contactID = $this->contactModel->create($newContact);

        if ($contactID > 0) jsonHeader('OK', 'Contact added');

        jsonHeader('error', 'Something went wrong!');
    }
}
