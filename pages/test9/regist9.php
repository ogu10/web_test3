<?php

$errors = [];
$data = [];

if (empty($_POST['name2'])) {
    $errors['name'] = 'Name is required.';
}

if (empty($_POST['no2'])) {
    $errors['no'] = 'No is required.';
}

if (empty($_POST['team2'])) {
    $errors['team'] = 'team is required.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);