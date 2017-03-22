

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php if($this->session->userdata('id_tipo_usuario')=='1')  { ?>
                    
                   
                    
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="glyphicon glyphicon-user"></i> Administrar usuarios <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="<?=base_url("index.php/c_usuario/index_usuario") ?>"><i class="glyphicon glyphicon-user"></i> Usuario</a>
                            </li>
                            <li>
                                <a href="<?=base_url("index.php/c_tipo_usuario/index") ?>"><i class="glyphicon glyphicon-list-alt"></i> Tipo usuario</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-bar-chart-o"></i>Administrar componente <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?=base_url("index.php/c_componente/index") ?>"><i class="glyphicon glyphicon-list-alt"></i> Componente</a>
                            </li>
                            <li>
                                <a href="<?=base_url("index.php/c_tipo_componente/index") ?>"><i class="glyphicon glyphicon-list-alt"></i> Tipo componente</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="<?=base_url("index.php/c_plataforma/index") ?>"><i class="fa fa-fw fa-table"></i> Administrar plataforma</a>
                    </li>
                     <li>
                        <a href="<?=base_url("index.php/c_sistema/index") ?>"><i class="fa fa-fw fa-desktop"></i> Administrar sistema</a>
                    </li>
                     <li>
                        <a href="<?=base_url("index.php/c_valor/index") ?>"><i class="fa fa-circle" aria-hidden="true"></i> Ingresar valores</a>
                    </li>
                     <li>
                        <a href="<?=base_url("index.php/c_tipo_muestra/index") ?>"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Administrar tipo muestra</a>
                    </li>
                   
                    <li id="cliente" >
                        <a href="<?=base_url("index.php/c_cliente/index")?>" ><i class="fa fa-fw fa-edit"></i> Agregar cliente</a>
                    </li>
                     <li>
                        <a href="<?=base_url("index.php/c_horario/index")?>"><i class="fa fa-fw fa-wrench"></i> Agregar horario</a>
                    </li>
                      <li>
                        <a href="<?=base_url("index.php/c_proposito/index")?>"><i class="fa fa-fw fa-file"></i> Agregar propósito</a>
                    </li>
                    <li>
                        <a href="<?=base_url("index.php/c_alerta/index")?>"><i class="fa fa-fw fa-dashboard"></i> Agregar alertas</a>
                    </li>
                    <li>
                        <a href="<?=base_url("index.php/c_servicio/index")?>"><i class="glyphicon glyphicon-sound-dolby"></i> Agregar servicio</a>
                    </li>
                    <li>
                        <a href="<?=base_url("index.php/c_sub_valor/index")?>"><i class="glyphicon glyphicon-compressed"></i> Agregar sub-valor</a>
                    </li>
                    
                    <?php }elseif($this->session->userdata('id_tipo_usuario')=='1'){ ?> 
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Administrar servicios</a>
                    </li>
                    <?php }elseif ($this->session->userdata('id_tipo_usuario')=='1') { ?>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Administrar componentes</a>
                    </li>
                    <?php }elseif($this->session->userdata('id_tipo_usuario')=='1') { ?>
                    <li class="active">
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Agregar cliente</a>
                    </li>
                    <?php }elseif($this->session->userdata('id_tipo_usuario')=='1') {?>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Administrar muestras</a>
                    </li>
                    <?php }elseif($this->session->userdata('id_tipo_usuario')=='1'){ ?>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Gestionar cliente</a>
                    </li>
                    <?php }elseif($this->session->userdata('id_tipo_usuario')=='1'){  ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>Mi Historial <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-list-alt"></i> Historial otros  Usuarios</a>
                            </li>
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-list-alt"></i> Buscar historial usario</a>
                            </li>
                        </ul>
                    </li>
                    <?php }elseif($this->session->userdata('id_tipo_usuario')=='1'){?>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Mensajes</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> Alertas</a>
                    </li>
                    <?php }?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

  