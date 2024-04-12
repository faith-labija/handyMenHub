<?php
function getUsers() {
    include '../settings/connection.php'; 

    $sql = "SELECT role FROM usertype WHERE id != 1";
    $result = $con->query($sql);
    $roles = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $roles[] = $row;
        }
    }

    //$con->close();
    return $roles;
}

echo getUsers();
?>
