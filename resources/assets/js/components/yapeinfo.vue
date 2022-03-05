<template>




   <br id="space1">
            <label id="label_dist" for="DISTRITO">Escoge tu distrito de entrega</label><br/>
              <select size="20" id="distrito" type="text" name="attributes[MUNICIPIO]" value="{{ cart.attributes.municipio }}" placeholder="DISTRITO..." required />
                <option value="">Distritos</option>
                <option value="MIRAFLORES"{% if cart.attributes.municipio == "MIRAFLORES" %} selected="selected"{% endif %}>MIRAFLORES</option>
                <option value="SAN ISIDRO"{% if cart.attributes.municipio == "SAN ISIDRO" %} selected="selected"{% endif %}>SAN ISIDRO</option>
                <option value="CHORRILLOS"{% if cart.attributes.municipio == "CHORRILLOS" %} selected="selected"{% endif %}>CHORRILLOS</option>
                <option value="SURCO"{% if cart.attributes.municipio == "SURCO" %} selected="selected"{% endif %}>SURCO</option>
                <option value="BARRANCO"{% if cart.attributes.municipio == "BARRANCO" %} selected="selected"{% endif %}>BARRANCO</option>
                <option value="JESUS MARIA"{% if cart.attributes.municipio == "JESUS MARIA" %} selected="selected"{% endif %}>JESUS MARIA</option>
                <option value="LA MOLINA"{% if cart.attributes.municipio == "LA MOLINA" %} selected="selected"{% endif %}>LA MOLINA</option>
                <option value="LA VICTORIA"{% if cart.attributes.municipio == "LA VICTORIA" %} selected="selected"{% endif %}>LA VICTORIA</option>
                <option value="LINCE"{% if cart.attributes.municipio == "LINCE" %} selected="selected"{% endif %}>LINCE</option>
                <option value="PUEBLO LIBRE"{% if cart.attributes.municipio == "PUEBLO LIBRE" %} selected="selected"{% endif %}>PUEBLO LIBRE</option>
                <option value="SAN BORJAS"{% if cart.attributes.municipio == "SAN BORJAS" %} selected="selected"{% endif %}>SAN BORJAS</option>
                <option value="SAN LUIS"{% if cart.attributes.municipio == "SAN LUIS" %} selected="selected"{% endif %}>SAN LUIS</option>
                <option value="SAN MIGUEL"{% if cart.attributes.municipio == "SAN MIGUEL" %} selected="selected"{% endif %}>SAN MIGUEL</option>
                <option value="SURQUILLO"{% if cart.attributes.municipio == "SURQUILLO" %} selected="selected"{% endif %}>SURQUILLO</option>
                <option value="LOS OLIVOS"{% if cart.attributes.municipio == "LOS OLIVOS" %} selected="selected"{% endif %}>LOS OLIVOS</option>
                <option value="BREÑA"{% if cart.attributes.municipio == "BREÑA" %} selected="selected"{% endif %}>BREÑA</option>
                <option value="COMAS"{% if cart.attributes.municipio == "COMAS" %} selected="selected"{% endif %}>COMAS</option>
                <option value="INDEPENDENCIA"{% if cart.attributes.municipio == "INDEPENDENCIA" %} selected="selected"{% endif %}>INDEPENDENCIA</option>
                <option value="SMP"{% if cart.attributes.municipio == "SMP" %} selected="selected"{% endif %}>SMP</option>
                <option value="SJL"{% if cart.attributes.municipio == "SJL" %} selected="selected"{% endif %}>SJL</option>

            </select>    
            <br id="space2">
          <br id="space3">



    <div class="component-control id-Z7_0064I3S0MOCFA0QAPLQOU91JM1"><span id="Z7_0064I3S0MOCFA0QAPLQOU91JM1"></span>
        <section class="ibmPortalControl wpthemeControl wpthemeHidden a11yRegionTarget" role="region"
            aria-label="<span lang=&quot;es&quot; dir=&quot;ltr&quot;>Visor de contenido web</span> 3">




            <div class="asa.portlet" id="asa.portlet.Z7_0064I3S0MOCFA0QAPLQOU91JM1" style="display:none;">
                <span class="asa.portlet.id">Z7_0064I3S0MOCFA0QAPLQOU91JM1</span>



            </div>

            <!-- start header markup -->
            <header class="wpthemeControlHeader" role="banner" aria-label="skinHeaderZ7_0064I3S0MOCFA0QAPLQOU91JM1">
                <div class="wpthemeInner">
                    <h2>
                        <img class="dndHandle" draggable="true"
                            ondragstart="wpModules.dnd.util.portletDragStart(event, this, this.parentNode, 30, 0);"
                            ondragend="wpModules.dnd.util.portletDragEnd(event);"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="">
                        <!-- lm-dynamic-title node marks location for dynamic title support -->
                        <span class="lm-dynamic-title asa.portlet.title a11yRegionLabel"><span lang="es" dir="ltr">Visor
                                de contenido web</span></span>
                    </h2>
                    <a aria-haspopup="true" aria-label="Mostrar menú de contenido" role="button" href="javascript:;"
                        class="wpthemeIcon wpthemeMenuFocus contextMenuInSkinIcon" style="display:none" tabindex="0">
                        <span title="Mostrar menú de contenido"><img aria-label="Mostrar menú de contenido" alt=""
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"></span>
                        <span class="wpthemeAltText">Menú de acciones de componente</span>
                        <!-- start CAM template -->
                        <span class="wpthemeMenu" data-positioning-handler="horizontallyCenteredBelow">
                            <div class="wpthemeMenuBorder">
                                <!-- define the menu item template inside the "ul" element.  only "css-class", "description", and "title" are handled by the theme's sample javascript. -->
                                <ul class="wpthemeMenuDropDown wpthemeTemplateMenu" role="menu">
                                    <li class="${css-class}" role="menuitem" tabindex="-1"><span
                                            class="wpthemeMenuText">${title}</span></li>
                                </ul>
                                <div class="verticalMenuPointer pointer"></div>
                            </div> <!-- Template for loading -->
                            <div class="wpthemeMenuLoading wpthemeTemplateLoading">${loading}</div>
                            <!-- Template for submenu -->
                            <div class="wpthemeAnchorSubmenu wpthemeTemplateSubmenu">
                                <div class="wpthemeMenuBorder wpthemeMenuSubmenu">
                                    <ul id="${submenu-id}" class="wpthemeMenuDropDown" role="menu">
                                        <li role="menuitem" tabindex="-1"></li>
                                    </ul>
                                </div>
                            </div>
                        </span>
                        <!-- end CAM template -->
                    </a>
                    <a aria-haspopup="true" aria-label="Mostrar menú de portlet" role="button" href="javascript:;"
                        class="wpthemeIcon wpthemeMenuFocus" tabindex="0"
                        onclick="if (typeof wptheme != 'undefined') wptheme.contextMenu.init({ 'node': this, menuId: 'skinAction', jsonQuery: {'navID':ibmCfg.portalConfig.currentPageOID,'windowID':wptheme.getWindowIDFromSkin(this)}, params: {'alignment':'right'}});"
                        onkeydown="javascript:if (typeof i$ != 'undefined' &amp;&amp; typeof wptheme != 'undefined') {if (event.keyCode ==13 || event.keyCode ==32 || event.keyCode==38 || event.keyCode ==40) {wptheme.contextMenu.init(this, 'skinAction', {'navID':ibmCfg.portalConfig.currentPageOID,'windowID':wptheme.getWindowIDFromSkin(this)}); return false;}}">
                        <span title="Mostrar menú de portlet"><img aria-label="Mostrar menú de portlet" alt=""
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"></span>
                        <span class="wpthemeAltText">Acciones</span>
                    </a>
                </div>
            </header>

            <div class="wpthemeControlBody _wpthemeOverflowAuto_ wpthemeClear">
                <!-- lm:control dynamic spot injects markup of layout control -->
                <!-- asa.overlay marks the node that the AsaOverlayWidget will be placed in -->
                <div style="position:relative; z-index: 1;">
                    <div class="analytics.overlay"></div>
                </div>


                <div class="bcp_presentacion_pasos bcp_pasos_dentro" taggeo-category="Sección Canales"
                    taggeo-action="Yape">
                    <div class="container bcp_padding_container_xlg">
                        <div class="row">
                            <div class="tab_titulo_pasos tab_titulo_pasos_hide_tablet principal">Aprende a usar YAPE
                            </div>
                            <div class="bcp_grupo_tabs">
                                <div class="col-xs-17 col-md-17 col-lg-5 tabs_grupo_pasos">
                                    <div class="tab_titulo_pasos tab_titulo_pasos_hide_desktop">Aprende a usar YAPE</div>
                                    <div class="bcp_grupo_tab_item" name-tab="1 Como me registro">¿Cómo me registro?
                                    </div>
                                    <div class="bcp_grupo_tab_item" name-tab="2 Como yapeo">¿Cómo yapeo?</div>
                                    <div class="bcp_grupo_tab_item active" name-tab="3 Como pago con QR">¿Cómo yapeo a
                                        un QR?</div>
                                    <div class="bcp_grupo_tab_item" name-tab="4 Donde encuentro mi QR">¿Dónde encuentro
                                        mi QR?</div>
                                    <div class="bcp_grupo_tab_item" name-tab="5 Como ver mi saldo">¿Cómo puedo ver mi
                                        saldo?</div>
                                    <div class="bcp_grupo_tab_item" name-tab="6 Como veo mis movimientos">¿Cómo veo mis
                                        movimientos?</div>
                                    <div class="bcp_grupo_tab_item" name-tab="7 Como retiro efectivo">¿Cómo retiro
                                        efectivo?</div>
                                </div>
                            </div>
                            <div class="col-xs-17 col-md-17 col-lg-12 pasos_respuestas">
                                <div class="bcp_component_pasos grupo" tag-padre="¿Cómo retiro efectivo?"
                                    name-tab="7 Como retiro efectivo" style="display: none;" tag-paso="1">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/145b1591-c2e4-4ca0-86dd-6e6b9c8ca187/CashOut_Paso1.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-145b1591-c2e4-4ca0-86dd-6e6b9c8ca187-n8Ut8gg"
                                                data-src-webp=""
                                                src="/wcm/connect/145b1591-c2e4-4ca0-86dd-6e6b9c8ca187/CashOut_Paso1.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-145b1591-c2e4-4ca0-86dd-6e6b9c8ca187-n8Ut8gg">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                1. Ingresa al Menú

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Selecciona la opción "Retiro de efectivo Yape".

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Cómo me registro?"
                                    name-tab="1 Como me registro" tag-paso="1" style="display: none;">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/6c1cd29f-921f-403c-bb85-c9b0c75e9b29/Registro_Paso1.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-6c1cd29f-921f-403c-bb85-c9b0c75e9b29-n8g4E1n"
                                                data-src-webp=""
                                                src="/wcm/connect/6c1cd29f-921f-403c-bb85-c9b0c75e9b29/Registro_Paso1.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-6c1cd29f-921f-403c-bb85-c9b0c75e9b29-n8g4E1n">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                1. Crear cuenta

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Descarga e instala Yape, luego ingresa a la app y elige la opción
                                                    "Crear cuenta". Debes ingresar tu número de celular y verificarlo
                                                    con el código que te enviaremos por SMS.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Dónde encuentro mi QR?"
                                    name-tab="4 Donde encuentro mi QR" style="display: none;" tag-paso="1">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/08998bd2-35a4-4640-90a3-7caa0209abd4/MiQR_Paso1.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-08998bd2-35a4-4640-90a3-7caa0209abd4-n8lf6U0"
                                                data-src-webp=""
                                                src="/wcm/connect/08998bd2-35a4-4640-90a3-7caa0209abd4/MiQR_Paso1.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-08998bd2-35a4-4640-90a3-7caa0209abd4-n8lf6U0">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                En la pantalla de desbloqueo

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Encuentra tu QR ahora en la pantalla de desbloqueo, a la mano, para
                                                    hacer tus cobros sin necesidad de compartir tu número de contacto.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo group_elements" tag-padre="¿Cómo yapeo a un QR?"
                                    name-tab="3 Como pago con QR" style="display: block;" tag-paso="1">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/0879f200-f377-4f05-9af1-89a33bf32f8c/PagoQR_Paso1.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-0879f200-f377-4f05-9af1-89a33bf32f8c-n8ld-Z-"
                                                data-src-webp=""
                                                src="/wcm/connect/0879f200-f377-4f05-9af1-89a33bf32f8c/PagoQR_Paso1.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-0879f200-f377-4f05-9af1-89a33bf32f8c-n8ld-Z-">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                1. Abre el escáner de QR:

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    En la pantalla principal, pulsa el botón de “QR", ubicado entre los
                                                    botones “Cobrar” y “Yapear”.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Cómo yapeo?" name-tab="2 Como yapeo"
                                    style="display: none;" tag-paso="1">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/cb835131-501c-4dab-bc4a-d7be30b9cf7b/PagoContacto_Paso1.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-cb835131-501c-4dab-bc4a-d7be30b9cf7b-n8lda5g"
                                                data-src-webp=""
                                                src="/wcm/connect/cb835131-501c-4dab-bc4a-d7be30b9cf7b/PagoContacto_Paso1.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-cb835131-501c-4dab-bc4a-d7be30b9cf7b-n8lda5g">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                1. Selecciona "Yapear"

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    En la pantalla principal, pulsa el botón “Yapear”.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Cómo veo mis movimientos?"
                                    name-tab="6 Como veo mis movimientos" style="display: none;" tag-paso="1">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/24e000be-43d3-4735-99ae-c32cb679a3a4/Movimientos_Paso1+%281%29.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-24e000be-43d3-4735-99ae-c32cb679a3a4-n8lhsKo"
                                                data-src-webp=""
                                                src="/wcm/connect/24e000be-43d3-4735-99ae-c32cb679a3a4/Movimientos_Paso1+%281%29.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-24e000be-43d3-4735-99ae-c32cb679a3a4-n8lhsKo">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                Pantalla Principal

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Aquí encontrarás un resumen de tus últimos yapeos. Para ver todo tu
                                                    historial de movimientos, pulsa en “Ver todos”.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Cómo retiro efectivo?"
                                    name-tab="7 Como retiro efectivo" style="display: none;" tag-paso="2">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/645847c9-cdf1-443f-9209-d10576cda456/CashOut_Paso2.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-645847c9-cdf1-443f-9209-d10576cda456-n8Ut8Q4"
                                                data-src-webp=""
                                                src="/wcm/connect/645847c9-cdf1-443f-9209-d10576cda456/CashOut_Paso2.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-645847c9-cdf1-443f-9209-d10576cda456-n8Ut8Q4">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                2. Monto a retirar

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Ingresa el monto a retirar e ingresa&nbsp;una clave para tu retiro.
                                                    Recuerda que puedes retirar hasta S/500 diario.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Cómo me registro?"
                                    name-tab="1 Como me registro" tag-paso="2" style="display: none;">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/1c8776b4-733b-47e3-8d0c-ad31e69bcbde/Registro_Paso2.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-1c8776b4-733b-47e3-8d0c-ad31e69bcbde-n8g4O7B"
                                                data-src-webp=""
                                                src="/wcm/connect/1c8776b4-733b-47e3-8d0c-ad31e69bcbde/Registro_Paso2.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-1c8776b4-733b-47e3-8d0c-ad31e69bcbde-n8g4O7B">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                2. Completa tus datos

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Ingresa tu DNI, correo electrónico y crea una clave de 6 dígitos
                                                    (con la que accederás a Yape).

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Dónde encuentro mi QR?"
                                    name-tab="4 Donde encuentro mi QR" style="display: none;" tag-paso="2">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/762557e3-97fd-46de-ba3f-42646575cbbc/MiQR_Paso2.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-762557e3-97fd-46de-ba3f-42646575cbbc-n8lfkGD"
                                                data-src-webp=""
                                                src="/wcm/connect/762557e3-97fd-46de-ba3f-42646575cbbc/MiQR_Paso2.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-762557e3-97fd-46de-ba3f-42646575cbbc-n8lfkGD">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                En “Perfil"

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Desde el menú, ingresa a la opción “Perfil”. Ahí también encontrarás
                                                    tu QR.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Cómo yapeo?" name-tab="2 Como yapeo"
                                    style="display: none;" tag-paso="2">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/6e266f66-a3bc-45d5-ad50-9b1355bd2703/PagoContacto_Paso2.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-6e266f66-a3bc-45d5-ad50-9b1355bd2703-n8ldfBr"
                                                data-src-webp=""
                                                src="/wcm/connect/6e266f66-a3bc-45d5-ad50-9b1355bd2703/PagoContacto_Paso2.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-6e266f66-a3bc-45d5-ad50-9b1355bd2703-n8ldfBr">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                2. Selecciona el contacto

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Elige la persona a quién quieres yapear.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo group_elements hide"
                                    tag-padre="¿Cómo yapeo a un QR?" name-tab="3 Como pago con QR"
                                    style="display: block;" tag-paso="2">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/406918d2-5605-443b-a9f5-0c6cea9b1821/PagoQR_Paso2.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-406918d2-5605-443b-a9f5-0c6cea9b1821-n8le3sK"
                                                data-src-webp=""
                                                src="/wcm/connect/406918d2-5605-443b-a9f5-0c6cea9b1821/PagoQR_Paso2.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-406918d2-5605-443b-a9f5-0c6cea9b1821-n8le3sK">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                2. Apunta al QR:

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Apunta con la cámara de tu celular sobre el QR que quieras escanear.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Cómo veo mis movimientos?"
                                    name-tab="6 Como veo mis movimientos" style="display: none;" tag-paso="2">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/2bdf3efe-4dd2-4ef2-935a-c1605355dd49/Movimientos_Paso2+%281%29.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-2bdf3efe-4dd2-4ef2-935a-c1605355dd49-n8lhHAT"
                                                data-src-webp=""
                                                src="/wcm/connect/2bdf3efe-4dd2-4ef2-935a-c1605355dd49/Movimientos_Paso2+%281%29.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-2bdf3efe-4dd2-4ef2-935a-c1605355dd49-n8lhHAT">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                Movimientos

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Ingresa a Menú y selecciona "Movimientos". Aquí puedes revisar todos
                                                    tus movimientos hechos por Yape, filtrar y enviar por correo tu
                                                    registro de movimientos.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Cómo retiro efectivo?"
                                    name-tab="7 Como retiro efectivo" style="display: none;" tag-paso="3">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/65c02cba-8ac6-4390-bd1e-7d7a986c93b6/CashOut_Paso3.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-65c02cba-8ac6-4390-bd1e-7d7a986c93b6-n8Ut8VM"
                                                data-src-webp=""
                                                src="/wcm/connect/65c02cba-8ac6-4390-bd1e-7d7a986c93b6/CashOut_Paso3.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-65c02cba-8ac6-4390-bd1e-7d7a986c93b6-n8Ut8VM">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                3. Retiro de Efectivo

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Acércate a un Agente BCP con tu DNI y la clave de retiro para
                                                    recibir tu efectivo.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Cómo me registro?"
                                    name-tab="1 Como me registro" tag-paso="3" style="display: none;">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/7d6d58c8-12d6-48e4-8ec1-2859ec13fc7a/Registro_Paso3.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-7d6d58c8-12d6-48e4-8ec1-2859ec13fc7a-n8UswS6"
                                                data-src-webp=""
                                                src="/wcm/connect/7d6d58c8-12d6-48e4-8ec1-2859ec13fc7a/Registro_Paso3.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-7d6d58c8-12d6-48e4-8ec1-2859ec13fc7a-n8UswS6">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                3. Elige cómo quieres unirte a Yape

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Si eres cliente BCP, regístrate con tu Credimás soles.
                                                    Si no eres cliente BCP, puedes registrarte solo con tu DNI eligiendo
                                                    la opción “Yape Card”.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Cómo yapeo?" name-tab="2 Como yapeo"
                                    style="display: none;" tag-paso="3">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/32c5c346-b2f0-4ed6-8129-99a859fcb20e/PagoContacto_Paso3.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-32c5c346-b2f0-4ed6-8129-99a859fcb20e-n8ldsqx"
                                                data-src-webp=""
                                                src="/wcm/connect/32c5c346-b2f0-4ed6-8129-99a859fcb20e/PagoContacto_Paso3.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-32c5c346-b2f0-4ed6-8129-99a859fcb20e-n8ldsqx">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                3. Ingresa el monto

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Coloca el monto y una nota (opcional), dale a “Yapear”.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo group_elements hide"
                                    tag-padre="¿Cómo yapeo a un QR?" name-tab="3 Como pago con QR"
                                    style="display: block;" tag-paso="3">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/ec6b7c98-0b9b-4b5e-8b11-40fefe8fd2a9/PagoQR_Paso3.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-ec6b7c98-0b9b-4b5e-8b11-40fefe8fd2a9-n8leVHk"
                                                data-src-webp=""
                                                src="/wcm/connect/ec6b7c98-0b9b-4b5e-8b11-40fefe8fd2a9/PagoQR_Paso3.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-ec6b7c98-0b9b-4b5e-8b11-40fefe8fd2a9-n8leVHk">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                3. Ingresa el monto

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Coloca el monto y una nota (opcional), dale a “Yapear”.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Cómo yapeo?" name-tab="2 Como yapeo"
                                    style="display: none;" tag-paso="4">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/83b29fbe-346c-40f2-8e78-115974cbb181/PagoContacto_Paso4.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-83b29fbe-346c-40f2-8e78-115974cbb181-n8g8gTX"
                                                data-src-webp=""
                                                src="/wcm/connect/83b29fbe-346c-40f2-8e78-115974cbb181/PagoContacto_Paso4.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-83b29fbe-346c-40f2-8e78-115974cbb181-n8g8gTX">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                4. ¡Yapeo listo!

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Se visualizará la pantalla de confirmación.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo group_elements hide"
                                    tag-padre="¿Cómo yapeo a un QR?" name-tab="3 Como pago con QR"
                                    style="display: block;" tag-paso="4">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/bfdb9fbd-7ef4-49a9-8ce6-cba82e98e6fe/PagoQR_Paso4.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-bfdb9fbd-7ef4-49a9-8ce6-cba82e98e6fe-n8legBa"
                                                data-src-webp=""
                                                src="/wcm/connect/bfdb9fbd-7ef4-49a9-8ce6-cba82e98e6fe/PagoQR_Paso4.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-bfdb9fbd-7ef4-49a9-8ce6-cba82e98e6fe-n8legBa">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                4. ¡Yapeo listo!

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    Se visualizará la pantalla de confirmación.

                                                </div>
                                            </div>
                                            <div class="botones_group">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bcp_component_pasos grupo" tag-padre="¿Cómo puedo ver mi saldo?"
                                    name-tab="5 Como ver mi saldo" style="display: none;" tag-paso="1">
                                    <div style="display:none;" class="bcp_component_sitearea"
                                        tag-grupo="Aprende a usar YAPE">
                                        ¡Aprende a usar YAPE!
                                    </div>
                                    <div class="contenedor_pasos">
                                        <div class="paso_imagen ">

                                            <img class=""
                                                data-src="/wcm/connect/ac5c0442-6c80-47ff-a4dc-4c296da6a4d4/MiSaldo_Paso1.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-ac5c0442-6c80-47ff-a4dc-4c296da6a4d4-n8lfF9n"
                                                data-src-webp=""
                                                src="/wcm/connect/ac5c0442-6c80-47ff-a4dc-4c296da6a4d4/MiSaldo_Paso1.jpg?MOD=AJPERES&amp;CACHEID=ROOTWORKSPACE-ac5c0442-6c80-47ff-a4dc-4c296da6a4d4-n8lfF9n">

                                        </div>
                                        <div class="paso_textos">
                                            <div class="titulo">

                                                Mostrar saldo

                                            </div>
                                            <div class="content_descripcion">
                                                <div class="descripcion">

                                                    En la pantalla principal, pulsa el botón “Mostrar saldo”, ubicado en
                                                    la zona superior izquierda y podrás visualizar el monto actual en tu
                                                    cuenta vinculada a Yape. Luego podrás ocultarlo pulsando “Ocultar
                                                    Saldo”.

                                                </div>
                                            </div>
                                            <div class="botones_group hide">
                                                <div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
                                                    tag-action="prev">
                                                    <svg class="icon bcp-arrow-left-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                    Anterior
                                                </div>
                                                <div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
                                                    tag-action="next">Siguiente
                                                    <svg class="icon bcp-arrow-right-f" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.52899 0.528986C6.23684 0.236835 5.76316 0.236835 5.47101 0.528987C5.17905 0.820953 5.17884 1.29426 5.47054 1.58649L9.1275 5.25H0.75C0.335786 5.25 0 5.58579 0 6C0 6.41421 0.335786 6.75 0.75 6.75H9.1275L5.47054 10.4135C5.17884 10.7057 5.17905 11.179 5.47101 11.471C5.76316 11.7632 6.23684 11.7632 6.52899 11.471L12 6L6.52899 0.528986Z"
                                                            fill="#ff7800"></path>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="wpthemeClear"></div>
            </div>
        </section>
    </div>

</template>

<script>
    export default {

        methods: {
            dinamico() {
                let jsonArray_tabs_vertical = [];
                let tabs_vertical_taggeoCategory = null;
                let tabs_vertical_taggeoAction = null;

                document.addEventListener("DOMContentLoaded", () => {


                    try {
                        tabs_vertical_taggeoCategory = document.querySelector(
                            '.bcp_presentacion_pasos.bcp_pasos_dentro').getAttribute('taggeo-category');
                        tabs_vertical_taggeoAction = document.querySelector(
                            '.bcp_presentacion_pasos.bcp_pasos_dentro').getAttribute('taggeo-action');

                    } catch (error) {

                    }

                    document.querySelector('.tab_titulo_pasos').innerText = document.querySelector(
                        '.bcp_component_sitearea').getAttribute('tag-grupo');

                    document.querySelectorAll('.bcp_pasos_dentro .bcp_component_pasos').forEach(function (
                        element, index) {
                        var cadena = {
                            "titulo": element.getAttribute('tag-padre'),
                            "name": element.getAttribute('name-tab')
                        };
                        jsonArray_tabs_vertical.push(cadena);
                    });

                    var DataJSON_Sort = fnSortJSON(jsonArray_tabs_vertical, 'name', 'asc');
                    var tag_filtrado = fnObjetoSinDuplicado(DataJSON_Sort, 'titulo');

                    tag_filtrado.forEach(function (element) {
                        var tab = document.querySelector('.bcp_pasos_dentro .tabs_grupo_pasos')

                        tab.innerHTML += '<div class="bcp_grupo_tab_item" name-tab="' + element.name +
                            '">' + element.titulo + '</div>';

                    });

                    let TabsPasos = document.querySelectorAll(
                        '.bcp_pasos_dentro .tabs_grupo_pasos .bcp_grupo_tab_item');
                    TabsPasos.forEach((tab, index) => {
                        tab.addEventListener("click", (event) => {
                            TabsPasos.forEach(reset_tab => {
                                reset_tab.classList.remove('active');
                            });
                            event.currentTarget.classList.add('active');
                            fnMostrarConComponentesdeTab(event.currentTarget.getAttribute(
                                'name-tab'));
                            fnMostrarPasoComponentesTabs(event.currentTarget.getAttribute(
                                'name-tab'));

                            fnTaggeoClickTab(event.currentTarget.innerText.trim());
                        });

                        if (index == 0) {
                            var tab_first = TabsPasos[0];
                            tab_first.classList.add('active');
                            fnMostrarConComponentesdeTab(tab_first.getAttribute('name-tab'));
                            fnMostrarPasoComponentesTabs(tab_first.getAttribute('name-tab'));
                        }
                    });


                    document.querySelectorAll('.btn_next.bcp_boton_naranja_sin_fondo_y_borde').forEach(btn => {
                        btn.addEventListener("click", (event) => {
                            var element = event.currentTarget;
                            var group_elements = fnGetParent(element,
                                '.bcp_component_pasos.group_elements');
                            var totalItems = document.querySelectorAll(
                                '.bcp_component_pasos.group_elements').length;

                            var grupo_sel = group_elements.getAttribute('tag-padre');
                            var numeropaso = 'Paso ' + group_elements.getAttribute('tag-paso') +
                                ' de ' + totalItems;
                            var tipodepaso = group_elements.querySelector('.titulo').innerText;
                            fnNextPasoTabSeleccionado(group_elements.getAttribute('tag-paso'),
                                grupo_sel);

                            //taggeo
                            var datosDataLayer = {
                                'event': 'virtualEvent',
                                'category': tabs_vertical_taggeoCategory,
                                'action': numeropaso,
                                'label': tipodepaso
                            };

                            dataLayer.push(datosDataLayer);
                        });

                    });


                    document.querySelectorAll('.btn_preview.bcp_boton_naranja_sin_fondo_y_borde').forEach(
                    btn => {
                        btn.addEventListener("click", (event) => {

                            var element = event.currentTarget;
                            var group_elements = fnGetParent(element,
                                '.bcp_component_pasos.group_elements');
                            var totalItems = document.querySelectorAll(
                                '.bcp_component_pasos.group_elements').length;

                            var grupo_sel = group_elements.getAttribute('tag-padre');
                            var numeropaso = 'Paso ' + group_elements.getAttribute('tag-paso') +
                                ' de ' + totalItems;
                            var tipodepaso = group_elements.querySelector('.titulo').innerText;

                            fnPreviewPasoTabSeleccionado(group_elements.getAttribute(
                                'tag-paso'), grupo_sel);
                            //taggeo
                            var datosDataLayer = {
                                'event': 'virtualEvent',
                                'category': tabs_vertical_taggeoCategory,
                                'action': numeropaso,
                                'label': tipodepaso
                            };

                            dataLayer.push(datosDataLayer);

                        });

                    });


                });

                function fnNextPasoTabSeleccionado(index_element, grupo) {
                    var index_next = parseInt(index_element) + 1;
                    document.querySelectorAll('.pasos_respuestas .bcp_component_pasos').forEach(comp => {
                        var tag_element = comp.getAttribute('tag-padre');
                        var totalItems = document.querySelectorAll('.bcp_component_pasos.group_elements')
                        .length;
                        var btn_next = comp.querySelector('.btn_next');
                        var datos = parseInt(btn_next.getAttribute('tag-paso'));

                        if (grupo == tag_element && index_next <= totalItems) {
                            if (index_next == comp.getAttribute('tag-paso')) {
                                comp.classList.remove('hide');
                            } else {
                                comp.classList.add('hide');
                            }
                            comp.querySelector('.btn_preview').classList.remove('disabled');
                        }
                        if (index_next == totalItems) {
                            comp.querySelector('.btn_next').classList.add('disabled');
                        }

                    });
                }

                function fnPreviewPasoTabSeleccionado(index_element, grupo) {
                    var index_preview = parseInt(index_element) - 1;
                    document.querySelectorAll('.pasos_respuestas .bcp_component_pasos').forEach(comp => {

                        var tag_element = comp.getAttribute('tag-padre');

                        if (grupo == tag_element && index_preview > 0) {
                            if (index_preview == comp.getAttribute('tag-paso')) {
                                comp.classList.remove('hide');
                            } else if (parseInt(index_element) > 1) {
                                comp.classList.add('hide');
                            }
                            comp.querySelector('.btn_next').classList.remove('disabled');
                        }

                        if (index_preview == 1) {
                            comp.querySelector('.btn_preview').classList.add('disabled');
                        }

                    });

                };

                function fnMostrarConComponentesdeTab(name_tab) {
                    document.querySelectorAll('.bcp_pasos_dentro .bcp_component_pasos').forEach(pregunta => {
                        pregunta.style.display = "none";
                        pregunta.classList.add('grupo');
                    });

                    document.querySelectorAll('.bcp_pasos_dentro .bcp_component_pasos[name-tab="' + name_tab + '"]')
                        .forEach(pregunta => {
                            pregunta.style.display = "block";
                            pregunta.classList.add('group_elements');
                        });
                }

                function fnMostrarPasoComponentesTabs(name_padre) {
                    var contador = 0;

                    document.querySelectorAll('.pasos_respuestas .bcp_component_pasos').forEach(comp => {
                        comp.classList.remove('hide');
                    });
                    document.querySelectorAll('.pasos_respuestas .bcp_component_pasos').forEach(comp => {
                        comp.classList.remove('group_elements');
                        var tag_element = comp.getAttribute('name-tab');
                        if (name_padre == tag_element) {
                            comp.classList.add('group_elements');

                            contador = contador + 1;
                            if (contador == 1) {
                                document.querySelectorAll('.pasos_respuestas .bcp_component_pasos .btn_preview')
                                    .forEach(btn => {
                                        btn.classList.add('disabled');
                                    });
                                document.querySelectorAll('.pasos_respuestas .bcp_component_pasos .btn_next')
                                    .forEach(btn => {
                                        btn.classList.remove('disabled');
                                    });
                                comp.querySelector('.btn_preview').classList.add('disabled');
                                comp.querySelector('.btn_next').classList.remove('disabled');
                            }
                            if (contador > 1) {
                                comp.classList.add('hide');
                            }

                            comp.setAttribute('tag-paso', contador);

                        }

                    });

                    if (contador == 1) {
                        document.querySelectorAll(
                            '.pasos_respuestas .bcp_component_pasos.group_elements .botones_group').forEach(
                        group => {
                            group.classList.add('hide');
                        })
                    }

                };

                function fnTaggeoClickTab(categoria) {
                    var titulo_tab_principal = document.querySelector('.tab_titulo_pasos.principal').innerText.trim();
                    var tag_tab = {
                        'event': 'virtualEvent',
                        'category': tabs_vertical_taggeoCategory,
                        'action': tabs_vertical_taggeoAction,
                        'label': titulo_tab_principal + ' - ' + categoria
                    };
                    dataLayer.push(tag_tab);
                };

            }
        }
    }
</script>

<style>
    .bcp_presentacion_pasos {
        font-family: Flexo;
        background: #F7F9FC;
    }

    .bcp_presentacion_pasos .icon.bcp-arrow-left-f {
        margin-right: 8px;
    }

    .bcp_presentacion_pasos .icon.bcp-arrow-right-f {
        margin-left: 8px;
    }

    .bcp_presentacion_pasos .botones_group .disabled .icon path {
        fill: #C4C4C4;
    }

    .bcp_presentacion_pasos .titulo {
        font-size: 18px;
        line-height: 20px;
        color: #012D74;
        font-weight: bold;
        padding-bottom: 16px;
    }

    .bcp_presentacion_pasos .descripcion {
        font-size: 14px;
        line-height: 16px;
        color: #282828;
    }

    .bcp_presentacion_pasos .paso_textos {
        float: right;
        padding: 24px;
        background: white;
        box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.1);
        border-radius: 0px 8px 8px 0px;
        display: grid;
        align-items: flex-end;
        width: -webkit-fill-available;
    }

    .bcp_presentacion_pasos .botones_group {
        display: inline-block;
        font-size: 12px;
    }

    .bcp_presentacion_pasos .btn_preview {
        float: left;
        padding-right: 26px;
    }

    .bcp_presentacion_pasos i.icon.bcp-arrow-left-f {
        padding-right: 4px;
        padding-top: 4px;
    }

    .bcp_presentacion_pasos .btn_next {
        float: right;
    }

    .bcp_presentacion_pasos i.icon.bcp-arrow-right-f {
        padding-left: 4px;
        padding-top: 4px;
    }

    .bcp_presentacion_pasos .disabled {
        color: #C4C4C4;
    }

    .bcp_presentacion_pasos .content_descripcion {
        margin: 0 0 auto;
    }

    .bcp_presentacion_pasos .pasos_numero {
        margin-top: -40px;
        position: absolute;
        color: #FFFFFF;
        font-size: 12px;
        line-height: 12px;
        font-weight: bold;
        padding-left: 32px;
    }

    @media only screen and (min-width: 320px) and (max-width: 767px) {
        .bcp_presentacion_pasos .pasos_respuestas {
            padding: 0px;
        }

        .bcp_presentacion_pasos .paso_textos {
            background: transparent;
            box-shadow: none;
        }

        .bcp_presentacion_pasos .botones_group {
            padding-top: 22px;
        }
    }

    @media only screen and (min-width: 320px) and (max-width: 1279px) {
        .tabs_grupo_pasos {
            width: max-content;
        }

        .bcp_presentacion_pasos .bcp_grupo_tabs::-webkit-scrollbar {
            display: none
        }

        .bcp_presentacion_pasos .bcp_grupo_tabs {
            overflow-x: auto;
        }
    }

    @media (min-width: 320px) {
        .tabs_grupo_pasos {
            display: flex;
            flex-direction: row;
            border-bottom: #EFF2F9 0.5px solid;
            margin-bottom: 26px;
        }

        .tabs_grupo_pasos .bcp_grupo_tab_item.active {
            transition: linear 200ms;
            color: #012D74;
            border-style: outset;
            border-radius: unset;
            border-color: transparent;
            box-shadow: 0px 5px 0px -1px #FF7800;
        }

        .tabs_grupo_pasos .bcp_grupo_tab_item:first-child {
            margin-left: 0px;
        }

        .tabs_grupo_pasos .bcp_grupo_tab_item {
            transition: linear 200ms;
            font-size: 14px;
            line-height: 20px;
            color: #5377A2;
            border-style: outset;
            border-radius: unset;
            padding-bottom: 10px;
            border-color: transparent;
            box-shadow: unset;
            margin-bottom: 3px;
            margin-left: 12px;
            margin-right: 12px;
            background-color: transparent;
            align-items: center;
            font-weight: bold;
            cursor: pointer;
        }

        .tab_titulo_pasos_hide_desktop {
            display: none;
        }

        .tab_titulo_pasos_hide_tablet {
            display: block;
        }

        .tab_titulo_pasos {
            font-size: 24px;
            line-height: 28px;
            color: #012D74;
            font-weight: bold;
            padding-bottom: 30px;
            text-align: center;
        }

        .bcp_presentacion_pasos .contenedor_pasos {
            display: block;
        }

        .paso_imagen {
            text-align: -webkit-center;
            background: transparent;
        }

        .paso_imagen img {
            width: auto;
            height: 242px;
        }

        .bcp_presentacion_pasos {
            padding-bottom: 0px;
            padding-top: 40px;
        }
    }

    @media (min-width: 768px) {
        .paso_imagen img {
            width: 467px;
            height: 370px;
        }

        .tab_titulo_pasos {
            font-size: 32px;
            line-height: 40px;
            color: #012D74;
            font-weight: bold;
            padding-bottom: 48px;
            text-align: center;
        }

        .bcp_presentacion_pasos .contenedor_pasos {
            display: flex;
        }

        .bcp_presentacion_pasos {
            padding-bottom: 72px;
            padding-top: 72px;
        }
    }

    @media (min-width: 1280px) {
        .tabs_grupo_pasos {
            display: unset;
            border-bottom: #EFF2F9 0.5px solid;
            margin-bottom: 26px;
            border-bottom: unset;
            margin-bottom: 0px;
        }

        .tabs_grupo_pasos .bcp_grupo_tab_item.active {
            border-style: outset;
            border-radius: unset;
            border-color: transparent;
            box-shadow: -5px 0px 0px -1px #FF7800;
        }

        .tabs_grupo_pasos .bcp_grupo_tab_item {
            margin-left: 0px;
            margin-right: 0px;
            margin-bottom: 28px;
            padding-left: 16px;
            padding-bottom: unset;
        }

        .paso_imagen img {
            width: 488px;
            height: 388px;
        }

        .tab_titulo_pasos {
            font-size: 32px;
            line-height: 40px;
            color: #012D74;
            font-weight: bold;
            padding-bottom: 48px;
            text-align: left;
        }

        .tab_titulo_pasos_hide_desktop {
            display: block;
        }

        .tab_titulo_pasos_hide_tablet {
            display: none;
        }
    }
</style>
