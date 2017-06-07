<?php
require ('../model/database.php');
require ('../model/home_list_db.php');
require ('../model/home_type_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL)
{
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL)
    {
        $action = 'list_homes';
    }
}

if ($action == 'list_homes')
{
    $type_id = filter_input(INPUT_GET, 'type_id',
        FILTER_VALIDATE_INT);
    if ($type_id == NULL || $type_id == FALSE)
    {
        $type_id = 1;
    }
    $type_name = get_type_name($type_id);

    //kew: changed
    $home_types = get_home_type();

    $homes = get_homes_by_type($type_id);
    include('home_list.php');
} else if ($action == 'delete_home')
{
    $list_id = filter_input(INPUT_POST, 'list_id',
        FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'category_id',
        FILTER_VALIDATE_INT);
    if ($type_id == NULL || $type_id == FALSE ||
        $list_id == NULL || $list_id == FALSE) {
        $error = "Missing or incorrect list id or type id.";
        include('../errors/error.php');
    } else {
        delete_home($list_id);
        header("Location: .?category_id=$type_id");
    }
} else if ($action == 'show_add_form') {
    $home_type = get_home_type();
    include('home_add.php');
} else if ($action == 'add_home') {
    $type_id = filter_input(INPUT_POST, 'type_id',
        FILTER_VALIDATE_INT);
    $list_id = filter_input(INPUT_POST, 'list_id');
    $list_street = filter_input(INPUT_POST, 'list_street');
    $list_city = filter_input(INPUT_POST, 'list_city');
    $list_state = filter_input(INPUT_POST, 'list_state');
    $list_zip = filter_input(INPUT_POST, 'list_zip');
    if ($type_id == NULL || $type_id == FALSE || $list_id == NULL ||
        $list_street == NULL || $list_city == NULL || $list_city == FALSE|| $list_state == NULL || $list_state == FALSE|| $list_zip == NULL || $list_zip == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        //KEW : you do not have a function called add product
        //add_product($type_id, $list_id, $list_street, $list_city, $list_state, $list_zip);
        //your function is called add home
        add_home($type_id, $list_id, $list_street, $list_city, $list_state, $list_zip);
        header("Location: .?category_id=$type_id");
    }
}
?>