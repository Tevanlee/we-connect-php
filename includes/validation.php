<?php
function validateUserInput($data) {
    if (
        empty($data['name']) ||
        empty($data['email']) ||
        empty($data['phone']) ||
        empty($data['message'])
    ) {
        return "All fields are required.";
    }

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format.";
    }

    if (!preg_match("/^(\+27|0)[6-8][0-9]{8}$/", $data['phone'])) {
        return "Invalid South African phone number.";
    }

    return null;
}
