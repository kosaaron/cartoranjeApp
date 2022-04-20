<?php
session_start();
if (isset($_SESSION['LoggedIn'])) {
    if (!$_SESSION['LoggedIn']) {
        $url = "login.php";
        header("Location: $url");
    }
} else {
    $url = 'login.php';
    header("Location: $url");
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>SSB System</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body id="body" class="display-flex flex-column">
    <div class="app-frame">
        <header id="page_header">
        <!-- <header id="page_header" class="display-flex"> -->
            <div id="page_header_title" class="full-width text-center"></div>
            <a type="button" class="btn btn-light user-button"><div class="user-icon-container"><i class="fas fa-user user-icon"></i></div><div class="user-name-container">Áron</div></a>
        </header>
        <!-- <div id="content_frame" class="flex-1 display-flex flex-row"> -->
        <div id="content_frame"  class="row">
            <div id="main_menu" class="col-lg-2">
                <!-- <div class="fixed-menu-item display-flex flex-column"> -->
                    <div id="menu_item_timesheet" class="menu-item display-flex flex-column">
                        <p class="pNullMargin">
                            <i class="fas fa-calendar-check menu-item-icon"></i>
                            <span class="menu-title">Munkarögzítés</span>
                        </p>
                    </div>
                    <div id="menu_item_partner" class="menu-item display-flex flex-column">
                        <p class="pNullMargin">
                            <i class="fas fa-user menu-item-icon"></i>
                            <span class="menu-title">Partnerek</span>
                        </p>
                    </div>
                    <div id="menu_item_tasks" class="menu-item display-flex flex-column">
                        <p class="pNullMargin">
                            <i class="fas fa-book menu-item-icon"></i>
                            <span class="menu-title">Naplózás</span>
                        </p>
                    </div>
                    <div id="menu_item_projects" class="menu-item display-flex flex-column">
                        <p class="pNullMargin">
                            <i class="fas fa-folder-open menu-item-icon"></i>
                            <span class="menu-title">Projektek</span>
                        </p>
                    </div>
                <!-- </div> -->
            </div>
            <div id="content" class="flex-1 col-lg-10">
                    <div class="content-box">
                        <div id="filter_header" class="row">
                            <div class="col-12 filter-container">
                                <div class="row">
                                    <div class="col-md-10 col-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-12">
                                                <input type="text" name="szűrő1" id="input_szűrő1" class="form-control filter-input" placeholder="szűrő1">
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-12">
                                                <input type="text" name="szűrő1" id="input_szűrő1" class="form-control filter-input" placeholder="szűrő1">
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-12">
                                                <input type="text" name="szűrő1" id="input_szűrő1" class="form-control filter-input" placeholder="szűrő1">
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-12">
                                                <input type="text" name="szűrő1" id="input_szűrő1" class="form-control filter-input" placeholder="szűrő1">
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-12">
                                                <input type="text" name="szűrő2" id="input_szűrő3" class="form-control filter-input" placeholder="szűrő3">
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-12">
                                                <input type="text" name="szűrő3" id="input_szűrő3" class="form-control filter-input" placeholder="szűrő3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 align-right">
                                        <a type="button" class="btn btn-light filter-button">Szűr <i class="fas fa-filter"></i></a>
                                    </div>
                                </div>
                            </div>
                            <a id="filter_header_close"><i class="fas fa-times"></i></a>
                        </div>
                        <div id="card_container" class="row">

                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <div id="prtnrm_2_card_24" class="card">
                                    <div class="card-body">
                                        <p class="card-text partner-name">Penta</p>
                                        <p class="card-text"><a href="tel:+3611231234">+3611231234</a></p>
                                        <p class="card-text"><a href="mailto:kiss.laszlo@penta.hu">kiss.laszlo@penta.hu</a></p>
                                    </div>
                                    <i class="fas fa-user partner-icon"></i>  
                                </div>
                            </div>                           
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <div id="prtnrm_2_card_24" class="card">
                                    <div class="card-body">
                                        <p class="card-text partner-name">Penta</p>
                                        <p class="card-text"><a href="tel:+3611231234">+3611231234</a></p>
                                        <p class="card-text"><a href="mailto:kiss.laszlo@penta.hu">kiss.laszlo@penta.hu</a></p>
                                    </div>
                                    <i class="fas fa-user partner-icon"></i>  
                                </div>
                            </div>                           
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <div id="prtnrm_2_card_24" class="card">
                                    <div class="card-body">
                                        <p class="card-text partner-name">Penta</p>
                                        <p class="card-text"><a href="tel:+3611231234">+3611231234</a></p>
                                        <p class="card-text"><a href="mailto:kiss.laszlo@penta.hu">kiss.laszlo@penta.hu</a></p>
                                    </div>
                                    <i class="fas fa-user partner-icon"></i>  
                                </div>
                            </div>                           
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <div id="prtnrm_2_card_24" class="card">
                                    <div class="card-body">
                                        <p class="card-text partner-name">Penta</p>
                                        <p class="card-text"><a href="tel:+3611231234">+3611231234</a></p>
                                        <p class="card-text"><a href="mailto:kiss.laszlo@penta.hu">kiss.laszlo@penta.hu</a></p>
                                    </div>
                                    <i class="fas fa-user partner-icon"></i>  
                                </div>
                            </div>                           
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <div id="prtnrm_2_card_24" class="card">
                                    <div class="card-body">
                                        <p class="card-text partner-name">Penta</p>
                                        <p class="card-text"><a href="tel:+3611231234">+3611231234</a></p>
                                        <p class="card-text"><a href="mailto:kiss.laszlo@penta.hu">kiss.laszlo@penta.hu</a></p>
                                    </div>
                                    <i class="fas fa-user partner-icon"></i>  
                                </div>
                            </div>                           
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <div id="prtnrm_2_card_24" class="card">
                                    <div class="card-body">
                                        <p class="card-text partner-name">Penta</p>
                                        <p class="card-text"><a href="tel:+3611231234">+3611231234</a></p>
                                        <p class="card-text"><a href="mailto:kiss.laszlo@penta.hu">kiss.laszlo@penta.hu</a></p>
                                    </div>
                                    <i class="fas fa-user partner-icon"></i>  
                                </div>
                            </div>                           

                        </div>
                    </div>
            </div>
            
                <a type="button" id="add_new_project" class="btn btn-light cc-button"><i class="fas fa-plus"></i></a>
                <a type="button" id="open_filter" class="btn btn-light cc-button cc-button-2"><i class="fas fa-filter"></i></a>
        </div>
    

<!-- Modal -->
<div class="modal add_new_modal" id="add_new_project_popup">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Új projekt</h5>
            <a id="add_modal_close"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Projekt neve</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Megrendelő</label>
                <select class="form-control" aria-label="Default select example">
                    <option value="1">Penta</option>
                    <option value="2">Invitech</option>
                    <option value="3">Újbuda</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Megrendelés díja</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
        </div>
      <div class="modal-footer">
        <button id="add_modal_cancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
        <button id="add_modal_submit" type="button" class="btn btn-primary">+Hozzáad</button>
      </div>
    </div>
  </div>
</div>
    <script type="module" src="js/main.js"></script>
    <script type="module" src="js/add_new.js"></script>
    <script type="module" src="js/filter.js"></script>
</body>

</html>