<?php

namespace App\Models;
use App\Models\Contracts\MysqlBaseModel;

class Contact extends MysqlBaseModel{
    public function __construct($id = null)
    {
        $this->table = 'ContactsTABLE';
        $this->primaryKey = 'ContactID';
        parent::__construct($id);
    }
}