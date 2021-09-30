<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Edytuj piłkarza</h4>

                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Strona główna</a></li>
                                <li class="breadcrumb-item"><a href="index.php?page=players">Piłkarze</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edytuj piłkarza</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                Akcje
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="?page=players">Cofnij</a>
                                <a class="dropdown-item" onclick="document.getElementById('edytuj-pilkarza').submit()">Zapisz piłkarza</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_REQUEST['playerName'])) {
                $sql = "UPDATE `player` SET `player_name`='" . $_REQUEST['playerName'] . "', `player_phoneNumber`='" . $_REQUEST['playerPhone'] . "', `player_skill`='" . $_REQUEST['playerSkill'] . "', `position_id`='" . $_REQUEST['playerPosition'] . "' WHERE `player_id`='" . $_REQUEST['id'] . "'";

                print_r($sql);

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    success("Pomyślnie edytowano piłkarza");
                } else {
                    warning("Bład w edycji piłkarza");
                }
            }



            $sql = "SELECT * FROM player WHERE player_id='" . $_REQUEST['id'] . "'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);

            $playerName = $playerPhoneNumber = $playerSkill = $playerPositionName = '';

            $playerName = $row['player_name'];
            $playerPhoneNumber = $row['player_phoneNumber'];
            $playerSkill = $row['player_skill'];
            $playerPositionName = $row['position_id'];

            ?>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Formularz edycji piłkarza</h4>
                    </div>
                </div>
                <form id="edytuj-pilkarza" method="POST">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Imię i nazwisko</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="<?php echo $playerName ?>" placeholder="Wprowadź imię i nazwisko..." name="playerName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Numer telefonu</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="tel" value="<?php echo $playerPhoneNumber ?>" placeholder="Wprowadź numer telefonu..." name="playerPhone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Poziom umiejętności</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="number" step="1" min="1" max="10" value="<?php echo $playerSkill ?>" placeholder="Wprowadź poziom umiejętności..." name="playerSkill">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Pozycja na boisku</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select2 col-12" name="playerPosition">
                                <option value="1" <?php echo $playerPositionName == 1 ? 'selected' : ''; ?>>Bramkarz</option>
                                <option value="2" <?php echo $playerPositionName == 2 ? 'selected' : ''; ?>>Obrońca</option>
                                <option value="3" <?php echo $playerPositionName == 3 ? 'selected' : ''; ?>>Pomocnik</option>
                                <option value="4" <?php echo $playerPositionName == 4 ? 'selected' : ''; ?>>Napastnik</option>
                            </select>
                        </div>
                    </div>
                </form>