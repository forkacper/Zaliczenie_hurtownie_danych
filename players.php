<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Piłkarze</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Strona główna</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Piłkarze</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                Akcje
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="?page=players&action=add">Dodaj piłkarza</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete') {
                require_once('players_delete.php');
            } else {
            }
            ?>

            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Tabela piłkarzy</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>LP</th>
                                <th>Imię i nazwisko</th>
                                <th>Numer telefonu</th>
                                <th>Poziom umiejętności (1-10)</th>
                                <th>Pozycja</th>
                                <th class="datatable-nosort">Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * FROM player INNER JOIN player_position ON player.position_id = player_position.position_id WHERE club_id='" . $_SESSION['clubid'] . "'";
                            $result = mysqli_query($conn, $sql);

                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['player_name'] ?></td>
                                    <td><?php echo $row['player_phoneNumber'] ?></td>
                                    <td><?php echo $row['player_skill'] ?></td>
                                    <td><?php echo $row['position_name'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="?page=players&action=edit&id=<?php echo $row['player_id'] ?>"><i class="dw dw-edit2"></i> Edytuj</a>
                                                <a class="dropdown-item" href="?page=players&action=delete&id=<?php echo $row['player_id'] ?>"><i class="dw dw-delete-3"></i> Usuń</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>



                            <?php }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>