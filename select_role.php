<?php
function getUsers() {
    include ('../settings/connection.php'); // Assuming you have a separate file for database connection

    $sql = "SELECT role FROM UserType WHERE role != 'super admin'";
    $result = $con->query($sql);
    $roles = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $roles[] = $row;
        }
    }

    $con->close();
    return $roles;
}
?>
