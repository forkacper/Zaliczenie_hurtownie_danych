<?php
require_once '../vendor/autoload.php';
require_once '../config.php';

$faker = Faker\Factory::create('pl_PL');

//CLUB
$clubName = "KS " . $faker->company();
$sql = "INSERT INTO `club` (`club_name`) VALUES ('" . $clubName . "')";
if (mysqli_query($conn, $sql)) {
    $lastClubId = mysqli_insert_id($conn);
}

if (isset($lastClubId)) {

    //USER OF CLUB
    $userName = $faker->userName();
    $email = $faker->email();
    $password = "Test1234!";
    $sql = "INSERT INTO `user` (`user_name`, `user_password`, `user_email`, `club_id`) VALUES ('" . $userName . "', '" . md5($password) . "', '" . $email . "', '" . $lastClubId . "')";
    mysqli_query($conn, $sql);

    //PLAYERS
    for ($i = 0; $i < 21; $i++) {
        $name = $faker->firstNameMale() . " " . $faker->lastName();
        $phone = $faker->phoneNumber();
        $skill = rand(1, 10);
        $position = rand(1, 4);

        $sql = "INSERT INTO `player` (`player_name`, `player_phoneNumber`, `player_skill`, `club_id`, `position_id`) VALUES ('" . $name . "', '" . $phone . "', '" . $skill . "', '" . $lastClubId . "', '" . $position . "')";

        mysqli_query($conn, $sql);
    }

    //PLAYERS POSITIONS
    $sql = "SELECT * FROM player_position";
    $result = mysqli_query($conn, $sql);

    $arrayWithPostions = ['Bramkarz', 'Obrońca', 'Pomocnik', 'Napastnik'];

    if (mysqli_num_rows($result) > 0) {
    } else {
        foreach ($arrayWithPostions as $position) {
            $sql = "INSERT INTO player_position (`position_name`) VALUES ('" . $position . "')";
            mysqli_query($conn, $sql);
        }
    }

    //STADIUM
    $stadiumName = "Stadion " . $faker->sentence(2);
    $stadiumSize = $faker->biasedNumberBetween($min = 5000, $max = 50000, $function = 'sqrt');
    $sql = "INSERT INTO `stadium` (`stadium_name`, `stadium_size`, `club_id`) VALUES ('" . $stadiumName . "', '" . $stadiumSize . "', '" . $lastClubId . "')";
    mysqli_query($conn, $sql);

    //ADDRESS
    $city = $faker->city();
    $streetName = $faker->streetName();
    $streetAddress = $faker->streetAddress();
    $postcode = $faker->postcode();
    $sql = "INSERT INTO `address` (`address_city`, `address_streetName`, `address_streetAddress`, `address_postcode`, `club_id`) VALUES ('" . $city . "', '" . $streetName . "', '" . $streetAddress . "', '" . $postcode . "', '" . $lastClubId . "')";
    mysqli_query($conn, $sql);

    //STAFF
    for ($i = 0; $i < 21; $i++) {
        $staffName = $faker->name();
        $staffRole = rand(1, 7);
        $staffSalary = $faker->biasedNumberBetween($min = 1500, $max = 10000, $function = 'sqrt');
        $sql = "INSERT INTO `staff` (`staff_name`, `staff_salary`, `club_id`, `role_id`) VALUES ('" . $staffName . "', '" . $staffSalary . "', '" . $lastClubId . "', '" . $staffRole . "')";
        mysqli_query($conn, $sql);
    }

    //STAFF ROLE
    $sql = "SELECT * FROM staff_role";
    $result = mysqli_query($conn, $sql);

    $arrayWithStaff = ['Prezes', 'Dyrektor', 'Trener', 'Asystent trenera', 'Trener siłowy', 'Trener bramkarzy', 'Skaut'];

    if (mysqli_num_rows($result) > 0) {
    } else {
        foreach ($arrayWithStaff as $staff) {
            $sql = "INSERT INTO `staff_role` (`role_name`) VALUES ('" . $staff . "')";
            mysqli_query($conn, $sql);
        }
    }
} else {
    echo "chuj nie działa";
}
