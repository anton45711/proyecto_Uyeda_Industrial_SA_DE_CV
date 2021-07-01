<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="">
            <a class="navbar-brand" href="principal.php"><img src="images/b.png" alt="Mi titulo de la imagen" style="width: 60px; height: 50px; margin:10px auto; display:block;"></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
           <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>-->

            <!-- Navbar-->
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $usuario; ?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                       
                      
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Salir</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">

                        
                            

<?php if($tipo_usuario == 1) { ?>

                           <div class="nav">



                            <div class="sb-sidenav-menu-heading">opciones</div>


                            <a class="nav-link" href="Nrequsicion.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-plus"></i></div>
                                Nueva requisición
                            </a>

                              
                          
                            <a class="nav-link" href="Rproducto.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-people-carry"></i></div>
                                Recibe producto
                            </a>

                            <a class="nav-link" href="AutJefe.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-thumbs-up"></i></div>
                                Autoriza el Jefé
                            </a>
                            <a class="nav-link" href="Afinanzas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-thumbs-up"></i></div>
                                Autoriza Finanzas
                            </a>

                             <a class="nav-link" href="Adirector.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-thumbs-up"></i></div>
                                Autoriza director
                            </a>


                            <a class="nav-link" href="Acompras.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Compras
                            </a>
                            <a class="nav-link" href="buscador.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Buscador
                            </a>
                            </div>
<?php }?>
                        
                        
<?php if($tipo_usuario == 2) { ?>

                           <div class="nav">
                            <div class="sb-sidenav-menu-heading">opciones</div>
                            <a class="nav-link" href="Nrequsicion.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Nueva Requisición 
                            </a>
                            <a class="nav-link" href="Rproducto.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Recibe producto
                            </a>
                           
                            
                            </div>
<?php }?>
                    

<?php if($tipo_usuario == 3) { ?>

                           
                            <div class="sb-sidenav-menu-heading">opciones</div>
                            <a class="nav-link" href="Nrequsicion.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Nueva Requisición 
                            </a>
                            <a class="nav-link" href="Rproducto.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Recibe producto
                            </a>
                            <a class="nav-link" href="AutJefe.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Autoriza el Jefé
                            </a>
                            
<?php }?>
                        
<?php if($tipo_usuario == 4) { ?>

                           
                            <div class="sb-sidenav-menu-heading">opciones</div>
                            <a class="nav-link" href="Nrequsicion.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Nueva Requisición 
                            </a>
                            <a class="nav-link" href="Rproducto.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Recibe producto
                            </a>
                            <a class="nav-link" href="AutJefe.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Autoriza el Jefé
                            </a>
                            <a class="nav-link" href="Afinanzas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Autoriza Finanzas
                            </a>
                            
<?php }?> 
                        
<?php if($tipo_usuario == 5) { ?> <!--DUDAS -->

                          
                            <div class="sb-sidenav-menu-heading">opciones</div>
                            <a class="nav-link" href="Nrequsicion.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Nueva Requisición 
                            </a>
                            <a class="nav-link" href="Rproducto.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Recibe producto
                            </a>
                            <a class="nav-link" href="AutJefe.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Autoriza el Jefé 
                            </a>
                            <a class="nav-link" href="Afinanzas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Autoriza Finanzas
                            </a>

                            <a class="nav-link" href="Adirector.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Autoriza director
                            </a>
                            
                            
                            
    <?php }?>
<?php if($tipo_usuario == 6) { ?> <!--DUDAS -->

                          
                            <div class="sb-sidenav-menu-heading">opciones</div>
                            <a class="nav-link" href="Nrequsicion.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Nueva Requisición 
                            </a>
                            <a class="nav-link" href="Rproducto.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Recibe producto
                            </a>
                            
                            
                            <a class="nav-link" href="Acompras.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Compras
                            </a>
                            <a class="nav-link" href="buscador.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Buscador <!-- Consulta de requisiciones-->
                            </a>
                            </div>
    <?php }?>
                            
                            
<div>
                        </div>

                
                    <div class="sb-sidenav-footer" style="margin-top:320px;">
                        <div class="small">Puesto:</div>
                        <?php echo $Puesto; ?>
                    </div>
                </nav>
            </div>