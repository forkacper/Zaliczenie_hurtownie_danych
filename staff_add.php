<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Nowy pracownik</h4>

                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Strona główna</a></li>
                                <li class="breadcrumb-item"><a href="index.php?page=staff">Pracownicy</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Nowy pracownik</li>
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
                                <a class="dropdown-item" onclick="document.getElementById('zapisz-pracownika').submit()">Zapisz pracownika</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_REQUEST['staffName'])) {
                $sql = "INSERT INTO `staff` (`staff_name`, `staff_salary`, `role_id`, `club_id`) VALUES ('" . $_REQUEST['staffName'] . "', '" . $_REQUEST['staffSalary'] . "', '" . $_REQUEST['staffRole'] . "', '" . $_SESSION['clubid'] . "')";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    success("Pomyślnie dodano nowego pracownika");
                } else {
                    warning("Bład dodawania pracownika, spróbuj ponownie");
                }
            }

            ?>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Formularz nowego pracownika</h4>
                    </div>
                </div>
                <form id="zapisz-pracownika" method="POST">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Imię i nazwisko</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Wprowadź imię i nazwisko..." name="staffName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Wynagrodzenie</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="number" placeholder="Wprowadź numer telefonu..." name="staffSalary">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Rola w klubie</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select2 col-12" name="staffRole">
                                <option value="1">Prezes</option>
                                <option value="2">Dyrektor</option>
                                <option value="3">Trener</option>
                                <option value="4">Asystent trenera</option>
                                <option value="5">Trener siłowy</option>
                                <option value="6">Trener bramkarzy</option>
                                <option value="7">Skaut</option>
                            </select>
                        </div>
                    </div>
                </form>