<?php
require('../model/database.php');
require('../model/home_list_db.php');
require('../model/home_type_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_homes';
    }
}  

if ($action == 'list_homes') {
    $type_id = filter_input(INPUT_GET, 'type_id',
            FILTER_VALIDATE_INT);
    if ($type_id == NULL || $type_id == FALSE) {
        $type_id = 1;
    }
    $home_type = get_home_type();
    $type_name = get_type_name($type_id);
    $products = get_homes_by_type($type_id);
    include('home_list.php');
} else if ($action == 'view_home') {
    $home_id = filter_input(INPUT_GET, 'list_id',
            FILTER_VALIDATE_INT);   
    if ($home_id == NULL || $home_id == FALSE) {
        $error = 'Missing or incorrect home id.';
        include('../errors/error.php');
    } else {
        $home_type = get_home_type();
        $home = get_home($home_id);

        // Get product data
        $list_id = $home['LIST_ID'];
        $list_street = $home['LIST_STREET'];
        $list_state = $home['LIST_STATE'];

//        // Calculate discounts
//        $discount_percent = 30;  // 30% off for all web orders
//        $discount_amount = round($list_price * ($discount_percent/100.0), 2);
//        $unit_price = $list_price - $discount_amount;
//
//        // Format the calculations
//        $discount_amount_f = number_format($discount_amount, 2);
//        $unit_price_f = number_format($unit_price, 2);
//
//        // Get image URL and alternate text
//        $image_filename = '../images/' . $code . '.png';
//        $image_alt = 'Image: ' . $code . '.png';

        include('home_view.php');
    }
}
?>