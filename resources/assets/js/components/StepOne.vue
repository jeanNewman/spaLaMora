<template>
	<div>

		<div class="m-1">

			<div class="bcp_presentacion_pasos bcp_pasos_dentro" taggeo-category="Sección Canales" taggeo-action="Yape">
				<div class="container bcp_padding_container_xlg">
					<div class="row">
						<div class="tab_titulo_pasos tab_titulo_pasos_hide_tablet principal">Aprende a usar YAPE</div>
						<div class="bcp_grupo_tabs">
							<div class="tabs_grupo_pasos">
								<div class="tab_titulo_pasos tab_titulo_pasos_hide_desktop"></div>
								<div class="bcp_grupo_tab_item active" name-tab="2 Como yapeo">¿Cómo yapeo?</div>
								<div class="bcp_grupo_tab_item" name-tab="3 Como pago con QR">¿Cómo yapeo a un
									QR?</div>
								<div class="bcp_grupo_tab_item" name-tab="4 Donde encuentro mi QR">¿Dónde encuentro mi
									QR?</div>
							</div>
						</div>
						<div class="col-xs-17 col-md-17 col-lg-12 pasos_respuestas">
							<div class="bcp_component_pasos grupo" tag-padre=""
								name-tab="2 Como yapeo"  tag-paso="1">
							
								<div class="contenedor_pasos">
									<div class="paso_imagen ">

										<img class=""
											:data-src="pasos[indice].image"
											data-src-webp=""
											:src="pasos[indice].image">

									</div>
									<div class="paso_textos">
										<div class="titulo">

											{{ pasos[indice].titulo }}

										</div>
										<div class="content_descripcion">
											<div class="descripcion">

												{{ pasos[indice].descripcion }}.

											</div>
										</div>
										<div class="botones_group">
											<div class="bcp_btn_pasos btn_preview bcp_boton_naranja_sin_fondo_y_borde disabled"
												tag-action="prev">
												<svg class="icon bcp-arrow-left-f" width="12" height="12"
													viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" clip-rule="evenodd"
														d="M5.47101 11.471C5.76317 11.7632 6.23684 11.7632 6.52899 11.471C6.82095 11.179 6.82116 10.7057 6.52946 10.4135L2.8725 6.75L11.25 6.75C11.6642 6.75 12 6.41421 12 6C12 5.58579 11.6642 5.25 11.25 5.25L2.8725 5.25L6.52946 1.58649C6.82117 1.29426 6.82095 0.820952 6.52899 0.528986C6.23684 0.236835 5.76317 0.236835 5.47101 0.528986L5.24537e-07 6L5.47101 11.471Z"
														fill="#ff7800"></path>
												</svg>

												Anterior
											</div>
											<div class="bcp_btn_pasos btn_next bcp_boton_naranja_sin_fondo_y_borde"
												tag-action="next">Siguiente
												<svg class="icon bcp-arrow-right-f" width="12" height="12"
													viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
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

		</div>
	</div>


</template>

<script>
export default {
	data(){
		return{
			pasos:[{
				image:"img/PagoContacto_Paso1.jpg", 
				titulo:'1. Selecciona "Yapear"',
				descripcion:"En la pantalla principal, pulsa el botón “Yapear”.",
				paso:1
			},{
				image:"img/PagoContacto_Paso2.jpg",
				titulo:'1. Selecciona "Yapear"',
				descripcion:" que fino es esto",
				paso:2
			},
			
			],
		   indice:0,
		 
		   
		
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
</style>