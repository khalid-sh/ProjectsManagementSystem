<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>pfe</title>
		<script  src="../../js/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../../bootstrap/bootstrap.css">
		<link rel="stylesheet"  src="../../js/bootstrap.js">
		<script  src="../../js/jquery-3.5.1.min.js"></script>


        <link rel="stylesheet" href="../../ionicons-1.5.2/css/ionicons.min.css">
       <link rel="stylesheet" type="text/css" href="../../css/app.css">
       <link rel="stylesheet" type="text/css" href="../../css/main.css">
       <link rel="stylesheet" type="text/css" href="../../css/table_projet.css">
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

       <link rel="stylesheet" href="../../fonts/css/all.css">

     
       <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <header>
            <a href="statistique">
            <div id="logo">
             <img src="../img/logopfe.png" alt="">
                <!-- <i class="ion-code-working"></i> -->
                <p>ProHelp</p>
            </div>
            </a>
            <div class="header-content">
                <div class="mybreadcrumb">
                    <div id="sidebar">
                        <div class="toggle-btn" >
                            <i class="fa fa-bars" onclick="test()"></i>
                        </div>
                    </div>
                    <!-- <div class="br-content">
                        <span class="home"> </span>
                        <span class="link"> </span>
                        <span class="text"> </span>
                    </div> -->
                </div>
                <!-- <div class="search-form">
                    <form action="#">
                        <input type="text" name="search" class="search-input">
                        <button type="submit" class="btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div> -->
                <span class="notification " id="notification">
                   
                    <i class="fa fa-bell"></i>
                    <span>0</span>
                    <div class="topmenu hide" id="topbar-menu">
                    <a href=""><i class="fa fa-info-circle" ></i> Mes informations</a>
                    <a href="logout"><i class="ion-power"></i> Se deconnecter</a>
                     </div>
                    
                    
               </span>
                <div class="account" id="account">
                        <img src="../img/avatar.jpg" alt="">
                        <i class="ion-chevron-down" id='ico-account'></i>
                </div>
                <div class="topmenu hide" id="topbar-menu">
                    <a href=""><i class="fa fa-info-circle"></i> Mes informations</a>
                    <a href="logout"><i class="ion-power"></i> Se deconnecter</a>
                </div>
              
            </div>
        </header>
        <div id="nav">
            <!-- <div class="menu">
                <a href="#"><i class="fa fa-align-left"></i>  Projects </a>
            </div> -->
            <div class="submenu" id="submenu">
                <a href="#"><i class="fa fa-align-left" ></i> Projects <i class="ion-chevron-down right"  id="icon"></i></a>
                <div class="sub-content hide" id="sub-content">
                    <a href="tables_projet"><i class="fa fa-table" ></i> Tables </a>
                    
                </div>
            </div>
            <div class="submenu" id="submenu">
                <a href="#"><i class="fa fa-users-cog"></i> Utilisateurs <i class="ion-chevron-down right"   id="icon"></i></a>
                <div class="sub-content hide" id="sub-content">
                    <a href="tables_employer"><i class="fa fa-table"></i> Tables </a>
                    <a href="add_employer"><i class="fa fa-user-plus"></i> Ajouter un utilisateur</a>
                    <a href="statistique_employer"><i class="fa fa-chart-line"></i> Statistiques</a>
                </div>
            </div>
            <div class="submenu" id="submenu">
                <a href="#"><i class="fa fa-user-friends" ></i> Équipes <i class="ion-chevron-down right"   id="icon"></i></a>
                <div class="sub-content hide" id="sub-content">
                    <a href="tables_equipe"><i class="fa fa-table"></i> Tables </a>
                    <a href="add_equipe"><i class="fa fa-user-plus"></i> Ajouter un Équipe</a>
                    <a href="statistique_equipe"><i class="fa fa-chart-line"></i> Statistiques</a>
                </div>
            </div>
            <div class="submenu" id="submenu">
                <a href="#"><i class="fa fa-tasks" ></i> Taches <i class="ion-chevron-down right " id="icon"></i></a>
                <div class="sub-content hide" id="sub-content">
                    <a href="tables_tache"><i class="fa fa-table"></i> Tables </a>
                    <a href="add_tache"><i class="fa fa-user-plus"></i> Ajouter une tache</a>
                    <a href="statistique_tache"><i class="fa fa-chart-line"></i> Statistiques</a>
                </div>
            </div>
            <div class="submenu" id="submenu">
                <a href="#"><i class="fa fa-file-invoice" ></i> Resource <i class="ion-chevron-down right"   id="icon"></i></a>
                <div class="sub-content hide" id="sub-content">
                    <a href="tables_resource"><i class="fa fa-table"></i> Tables </a>
                    <a href="add_resource"><i class="fa fa-user-plus"></i> Ajouter un Resource</a>
                    <a href="statistique_resource"><i class="fa fa-chart-line"></i> Statistiques</a>
                </div>
            </div>
        </div>
            <div id="inside" >
                <div class='data'>
                    @yield('content')
                </div>     
            </div>
       
        <div class="footer">
            <div class="company">
                <a href="#"><i class="ion-code-working"></i>
                Project <strong>Logo</strong></a>
            </div>
            <div class="link">
                <a href="">A propos</a>
                <div class="separator">|</div>
                <a href="">Aide</a>
                <div class="separator">|</div>
                <a href="">Feedback</a>
                <div class="separator">|</div>
                <a href="">Conditions</a>
                <div class="separator">|</div>
                <a href="">Mentions</a>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    
    <script type="text/javascript" src="../../js/app.js"></script>
    <script type="text/javascript"></script>
    
    
    
</html>
