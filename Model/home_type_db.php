<?php
function get_home_type() {
    global $db;
    $query = 'SELECT * FROM home_type
              ORDER BY TYPE_ID';
    $statement = $db->prepare($query);
    $statement->execute();
    //KEW: the following was missing
    //use fetchAll to get the array of value when returning multiple results
    $home_types = $statement->fetchAll();
    $statement->closeCursor();    
    return $home_types;
}

function get_type_name($type_id) {
    global $db;
    $query = 'SELECT type_name FROM home_type
              WHERE TYPE_ID = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();    
    $home_type = $statement->fetch();
    $statement->closeCursor();
    //KEW : you had     
    //$home_type = $home_type['hometype'];
    // There is no column in the home_type table called hometype
    $home_name = $home_type['type_name'];
    
    return $home_name;
}
?>