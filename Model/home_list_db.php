<?php
function get_homes_by_type($type_id) {
    global $db;
    $query = 'SELECT * FROM home_list
              WHERE TYPE_ID = :type_id
              ORDER BY list_street';
    //KEW: why are you ordering by type_id
    //you are only se;lecting homes of one type          
    $statement = $db->prepare($query);
    $statement->bindValue(":type_id", $type_id);
    $statement->execute();
    $homes = $statement->fetchAll();
    $statement->closeCursor();
    return $homes;
}

function get_home($list_id) {
    global $db;
    $query = 'SELECT * FROM home_list
              WHERE LIST_ID = :list_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":list_id", $list_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function delete_home($list_id) {
    global $db;
    $query = 'DELETE FROM home_list
              WHERE LIST_ID = :list_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':list_id', $list_id);
    $statement->execute();
    $statement->closeCursor();
}

/**
 * @param $type_id
 * @param $list_id
 * @param $list_street
 * @param $list_city
 * @param $list_state
 * @param $list_zip
 */
function add_home($type_id, $list_id, $list_street, $list_city, $list_state, $list_zip) {
    global $db;
    $query = 'INSERT INTO home_list
                 (TYPE_ID, LIST_ID, LIST_STREET, LIST_CITY, LIST_STATE, LIST_ZIP)
              VALUES
                 (:type_id, :list_id, :list_street, :list_city, :list_state, :list_zip)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':list_id', $list_id);
    $statement->bindValue(':list_street', $list_street);
    $statement->bindValue(':list_city', $list_city);
    $statement->bindValue(':list_state',$list_state);
    $statement->bindValue(':list_zip', $list_zip);
    $statement->execute();
    $statement->closeCursor();
}
?>