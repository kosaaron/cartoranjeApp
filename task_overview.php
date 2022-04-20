<?php
// session_start();

// if (isset($_SESSION['LoggedIn'])) {
//     if ($_SESSION['LoggedIn']) {
//         $url = 'index.php';
//         header("Location: $url");
//     }
// }

// if (isset($_GET['act_code']) and isset($_GET['new_pass'])) {
//     if ($_GET['new_pass'] == 'true') {
//         $url = 'change_password.php?act_code=' . $_GET['act_code'];
//         header("Location: $url");
//     }

// }
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <title>SSBS - Login</title>
    <meta name="format-detection" content="telephone=no">
    <!-- <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> -->
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">

</head>

<body class="display-flex flex-column">
    <div class="overview-container row">
        <!-- <div class="d-flex align-items-stretch"> -->
            <div class="col-2"></div>
            <div class="col-8">
                <div class="modal-content overview-content-card">
                    <div class="modal-header">
                        <h5 class="modal-title">Megrendelés áttekintő</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">                                
                                <div class="mb-3">
                                    <label for="new_partner_name" class="form-label">Megrendelő neve</label>
                                    <input type="text" class="form-control" id="new_partner_name" value="Nagy Károly" placeholder="" disabled>
                                </div>
                            </div>
                            <div class="col-6">                                
                                <div class="mb-3">
                                    <label for="new_partner_name" class="form-label">Megrendelés címe:</label>
                                    <input type="text" class="form-control" id="new_partner_name" value="Budapest 16, Rákosi út 185" placeholder="" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="send_info_request" type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-question"></i> Segítséget kérek</button>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        <!-- </div> -->
    </div>
    <!-- <script src="js/login.js"></script> -->
</body>

</html>