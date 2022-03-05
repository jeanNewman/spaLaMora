<div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li @click="menu=0" class="nav-item">
                        <a class="nav-link active" href="#"><i class="icon-speedometer"></i> Escritorio</a>
                    </li>
                    <li class="nav-title">
                        Mantenimiento
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bag"></i> Almacén</a>
                        <ul class="nav-dropdown-items">
                            <li @click="menu=1" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-bag"></i> Categorías</a>
                            </li>
                            <li @click="menu=2" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-bag"></i> Artículos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="fab fa-shopify"></i> Shopify</a>
                        <ul class="nav-dropdown-items">
                           
                            <li @click="menu=22" class="nav-item">
                                <a class="nav-link" href="#"><i class="fab fa-shopify"></i> Upload Csv</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-list-alt"></i> Recetas</a>
                        <ul class="nav-dropdown-items">
                            <li @click="menu=21" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-list-alt"></i> Recetas</a>
                            </li>
                                                    
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-wallet"></i> Compras</a>
                        <ul class="nav-dropdown-items">
                            <li @click="menu=3" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-wallet"></i> Ingresos</a>
                            </li>
                            <li @click="menu=4" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-notebook"></i> Proveedores</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-basket"></i> Ventas</a>
                        <ul class="nav-dropdown-items">
                            <li @click="menu=5" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-basket-loaded"></i> Ventas</a>
                            </li>
                            <li @click="menu=13" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-basket-loaded"></i> Pedidos</a>
                            </li>
                            <li @click="menu=6" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-notebook"></i> Clientes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Acceso</a>
                        <ul class="nav-dropdown-items">
                            <li @click="menu=7" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-user"></i> Usuarios</a>
                            </li>
                            <li @click="menu=8" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-user-following"></i> Roles</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Reportes</a>
                        <ul class="nav-dropdown-items">
                            <li @click="menu=9" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Reporte Ingresos</a>
                            </li>
                            <li @click="menu=10" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Reporte Ventas</a>
                            </li>
                            <li @click="menu=14" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Rpt Consolidado Art</a>
                            </li>
                            <li @click="menu=15" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Rpt Despacho</a>
                            </li>
                            <li @click="menu=28" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Rpt Cajera</a>
                            </li>
                            <li @click="menu=16" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Rpt Rutas</a>
                            </li>
                            <li @click="menu=17" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Rpt Marcaciones</a>
                            </li>
                            <li @click="menu=18" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Rpt Pagos</a>
                            </li>
                            <li @click="menu=19" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Rpt Comentario</a>
                            </li>
                            <li @click="menu=20" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Rpt Cons. Art Receta</a>
                            </li>
                            <li @click="menu=23" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Rpt Det Venta/Usuario</a>
                            </li>
                            <li @click="menu=24" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Rpt Cons. Venta/Usuario</a>
                            </li>
                            <li @click="menu=26" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Rpt Cons. Slot</a>
                            </li>
                            <li @click="menu=27" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Rpt Forma de Pago</a>
                            </li>
                        </ul>
                    </li>
                    <li @click="menu=11" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-book-open"></i> Ayuda <span class="badge badge-danger">PDF</span></a>
                    </li>
                    <li @click="menu=12" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-info"></i> Acerca de...<span class="badge badge-info">IT</span></a>
                    </li>
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>