<template>
	<div>

		<b-container>

			<div class="bcp_presentacion_pasos bcp_pasos_dentro" taggeo-category="Sección Canales" taggeo-action="Yape">
				<div class="container bcp_padding_container_xlg">
					<div class="row">
						<b-col cols="12">
						<div class="tab_titulo_pasos tab_titulo_pasos_hide_tablet">Aprende a usar YAPE</div>
						<div class="bcp_grupo_tabs">
							<div class="tabs_grupo_pasos" style="align:center">
								<div class="tab_titulo_pasos tab_titulo_pasos_hide_desktop principal">aPR</div>
								<div @click="tipoTituloPasos(0)" :class="[value===0?'bcp_grupo_tab_item active':'bcp_grupo_tab_item' ]" >¿Cómo yapeo?</div>
								<div @click="tipoTituloPasos(1)" :class="[value===1?'bcp_grupo_tab_item active':'bcp_grupo_tab_item' ]" name-tab="2 Como pago con QR">¿Cómo yapeo a un QR?</div>
								<div @click="tipoTituloPasos(2)" :class="[value===2?'bcp_grupo_tab_item active':'bcp_grupo_tab_item' ]" name-tab="3 Donde encuentro mi QR">¿Dónde encuentro mi QR?</div>
							</div>
						</div>
						
						<div class="col-xs-17 col-md-17 col-lg-12 pasos_respuestas">
							<div class="bcp_component_pasos grupo" tag-padre=""
								namename-tab="2 Como yapeo"  tag-paso="1">
							
								<div class="contenedor_pasos">
									<div class="paso_imagen ">

										<img class=""
											:data-src="pasos[indice].imagen"
											data-src-webp=""
											:src="pasos[indice].imagen">

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
											<button id='1' @click="btnMoverClick(0)" :class="[indice===0?'disabled':'']+' previous btn btn-primary'" type='button'>
												<span class="glyphicon glyphicon-chevron-left"></span>
													Anterior
												</button>
												<button id='1' @click="btnMoverClick(1)" :class="[indice===pasos.length?'disabled':'']+' next btn btn-primary'" type='button'>
													Siguiente
												<span class="glyphicon glyphicon-chevron-right"></span>
											</button>

										
										</div>
									</div>
								</div>
							</div>
							
						</div>
						</b-col>
					</div>
				</div>
			</div>

		</b-container>
	</div>


</template>

<script>
export default {
	 beforeMount(){
      this.inicializar();
     },
	data(){
		return{
			yapeo:[{
				imagen:"img/PagoContacto_Paso1.jpg", 
				titulo:'1. Selecciona "Yapear"',
				descripcion:"En la pantalla principal, pulsa el botón “Yapear”.",
				paso:1
			},{
				imagen:"img/PagoContacto_Paso2.jpg",
				titulo:'2. Selecciona el contacto',
				descripcion:"Elige la persona a quién quieres yapear.",
				paso:2
			},{
				imagen:"img/PagoContacto_Paso3.jpg",
				titulo:'3. Ingresa el monto',
				descripcion:'Coloca el monto y una nota (opcional), dale a "Yapear"',
				paso:3
			},{
				imagen:"img/PagoContacto_Paso4.jpg",
				titulo:'4. ¡Yapeo listo!',
				descripcion:"Se visualizará la pantalla de confirmación.",
				paso:4
			},

			
			],
		   indice:0,
		   value:0,
		   
		   pasos:[],
		   
		
		}
	},
	methods:{
		inicializar(){
			this.pasos = this.yapeo;
		},
		tipoTituloPasos(valor){
			this.value=valor;
			this.indice = 0;
		},
		btnMoverClick(valor){
			if(valor===0){
				if(this.indice > 0){
					this.indice--;
				}
			}else{
					if(this.indice < this.pasos.length){
					this.indice++;
				}
			}
		}
	},
	
	mounted(){
         this.$emit('can-continue', {value: true});
    }

}
</script>

<style>
.next {
  float: right;
}
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
    
        @media only screen and (min-width: 320px) and (max-width: 1199.98px) {
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
    
        @media (min-width: 3000px) {
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