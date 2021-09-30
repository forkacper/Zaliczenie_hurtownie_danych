<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Edytuj pracownika</h4>

                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Strona główna</a></li>
                                <li class="breadcrumb-item"><a href="index.php?page=staff">Pracownicy</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edytuj pracownika</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                Akcje
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="?page=staff">Cofnij</a>
                                <a class="dropdown-item" onclick="document.getElementById('edytuj-pracownika').submit()">Zapisz pracownika</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_REQUEST['staffName'])) {
                $sql = "UPDATE `staff` SET `staff_name`='" . $_REQUEST['staffName'] . "', `staff_salary`='" . $_REQUEST['staffSalary'] . "', `role_id`='" . $_REQUEST['staffRole'] . "' WHERE `staff_id`='" . $_REQUEST['id'] . "'";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    success("Pomyślnie edytowano pracownika");
                } else {
                    warning("Bład w edycji pracownika, spróbuj ponownie");
                }
            }



            $sql = "SELECT * FROM staff WHERE staff_id='" . $_REQUEST['id'] . "'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);

            $staffName = $staffSalary = $staffRole = '';

            $staffName = $row['staff_name'];
            $staffSalary = $row['staff_salary'];
            $staffRole = $row['role_id'];

            ?>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Formularz edycji pracownika</h4>
                    </div>
                </div>
                <form id="edytuj-pracownika" method="POST">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Imię i nazwisko</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="<?php echo $staffName ?>" placeholder="Wprowadź imię i nazwisko..." name="staffName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Wynagrodzenie</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="number" value="<?php echo $staffSalary ?>" placeholder="Wprowadź poziom umiejętności..." name="staffSalary">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Rola w klubie</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select2 col-12" name="staffRole">
                                <option value="1" <?php echo $staffRole == 1 ? 'selected' : ''; ?>>Prezes</option>
                                <option value="2" <?php echo $staffRole == 2 ? 'selected' : ''; ?>>Dyrektor</option>
                                <option value="3" <?php echo $staffRole == 3 ? 'selected' : ''; ?>>Trener</option>
                                <option value="4" <?php echo $staffRole == 4 ? 'selected' : ''; ?>>Asystent trenera</option>
                                <option value="5" <?php echo $staffRole == 5 ? 'selected' : ''; ?>>Trener siłowy</option>
                                <option value="6" <?php echo $staffRole == 6 ? 'selected' : ''; ?>>Trener bramkarzy</option>
                                <option value="7" <?php echo $staffRole == 7 ? 'selected' : ''; ?>>Skaut</option>
                            </select>
                        </div>
                    </div>
                </form>