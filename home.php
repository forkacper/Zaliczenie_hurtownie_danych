<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="vendors/images/banner-img.png" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Witaj <div class="weight-600 font-30 text-blue"><?php echo $_SESSION['username'] ?></div>
                    </h4>
                    <p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.</p>
                </div>
            </div>
        </div>

        <?php
        $sql = "SELECT COUNT(player_id) AS LiczbaPilkarzy FROM player WHERE player.club_id='" . $_SESSION['clubid'] . "'";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="row pb-10">
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark"><?php echo $row['LiczbaPilkarzy'] ?></div>
                            <div class="font-14 text-secondary weight-500">Liczba piłkarzy w klubie</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT COUNT(staff_id) AS LiczbaPracownikow FROM staff WHERE staff.club_id='" . $_SESSION['clubid'] . "'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);
            ?>

            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark"><?php echo $row['LiczbaPracownikow'] ?></div>
                            <div class="font-14 text-secondary weight-500">Liczba pracowników w klubie</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#ff5b5b"><span class="icon-copy dw dw-meeting"></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT stadium_size FROM stadium WHERE club_id='" . $_SESSION['clubid'] . "'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);
            ?>

            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark"><?php echo $row['stadium_size'] ?></div>
                            <div class="font-14 text-secondary weight-500">Rozmiar stadionu</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon"><i class="icon-copy dw dw-resize" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT SUM(staff_salary) AS SumSalary FROM staff WHERE club_id='" . $_SESSION['clubid'] . "'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);
            ?>

            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark"><?php echo $row['SumSalary'] ?> zł</div>
                            <div class="font-14 text-secondary weight-500">Koszt utrzymania pracowników</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#09cc06"><i class="icon-copy fa fa-money" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php

        $sql = "SELECT * FROM player INNER JOIN player_position ON player.position_id = player_position.position_id WHERE club_id='" . $_SESSION['clubid'] . "' ORDER BY player_skill DESC LIMIT 5";
        $result = mysqli_query($conn, $sql);

        ?>

        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">Najlepsi zawodnicy w klubie</h4>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imię i nazwisko</th>
                        <th scope="col">Poziom umiejętności</th>
                        <th scope="col">Pozycja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $row['player_name'] ?></td>
                            <td><?php echo $row['player_skill'] ?></td>
                            <td><?php echo $row['position_name'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>