<?php
$sql = "DELETE FROM `player` WHERE `player_id`='" . $_REQUEST['id'] . "'";
$result = mysqli_query($conn, $sql);

header("Location: index.php?page=players");

if ($result) {
    success("Pomyślnie usunięto piłkarza");
} else {
    warning("Usuwanie piłkarza nie udane, spróbuj ponownie");
}
