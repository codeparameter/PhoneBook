<?php

function validate_phone(string $phone)
{
    if (
        !preg_match('/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/', $phone) &&
        !preg_match('/^0[0-9]{2,}[0-9]{7,}$/', $phone)
    )
        jsonHeader('error', 'Incorrect phone format!');
}

function validate_contact($contact)
{
    if (is_null($contact))
        jsonHeader('error', 'Wrong Contact ID!');
    return $contact;
}

function confirm_delete($contact)
{
    if ($contact == 0)
        jsonHeader('error', 'Wrong Contact ID!');
    return $contact;
}
