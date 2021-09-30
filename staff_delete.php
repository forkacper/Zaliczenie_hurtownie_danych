<?php
$sql = "DELETE FROM `staff` WHERE `staff_id`='" . $_REQUEST['id'] . "'";
$result = mysqli_query($conn, $sql);

if ($result) {
    success("Pomyślnie usunięto pracownika");
} else {
    warning("Usuwanie pracownika nie udane, spróbuj ponownie");
}
