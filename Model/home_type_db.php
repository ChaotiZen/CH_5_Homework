<?php
function get_home_type() {
    global $db;
    $query = 'SELECT * FROM home_listings.home_type
              ORDER BY TYPE_ID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_type_name($type_id) {
    global $db;
    $query = 'SELECT * FROM home_listings.home_type
              WHERE TYPE_ID = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();    
    $home_type = $statement->fetch();
    $statement->closeCursor();    
    $home_type = $home_type['hometype'];
    return $home_type;
}
?>