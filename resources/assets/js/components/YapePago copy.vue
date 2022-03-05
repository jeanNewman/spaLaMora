<template>
  <main class="main">
    <!-- yape pago -->
  <section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-8 is-offset-2">
                <horizontal-stepper :steps="demoSteps" :datos="datos"
                                    @active-step="isStepActive" @stepper-finished="alert"
                >                     
                </horizontal-stepper>
            </div>
        </div>
    </div>
</section>

  </main>
</template>

<script>
 
import HorizontalStepper from 'vue-stepper';
 
    // This components will have the content for each stepper step.
    import StepOne from './StepOne.vue';
    import StepTwo from './StepTwo.vue';
    import Swal from 'sweetalert2'
 
    export default {
        components: {
            HorizontalStepper,
            Swal
        },
        props: ['datos'],
        data(){
            return {
                demoSteps: [
                    {
                        icon: 'looks_one',
                        name: 'first',
                        title: 'Intrudcucción',
                        subtitle: '',
                        component: StepOne,
                        completed: true
 
                    },
                    {
                        icon: 'looks_two',
                        name: 'second',
                        title: 'Subir Imagen',
                        subtitle: '',
                        component: StepTwo,
                        completed: true,
                        
                    }
                ]
            }
        },
        methods: {
            // Executed when @completed-step event is triggered
            completeStep(payload) {
                this.demoSteps.forEach((step) => {
                    if (step.name === payload.name) {
                        step.completed = true;
                    }
                })
            },
            // Executed when @active-step event is triggered
            isStepActive(payload) {
                this.demoSteps.forEach((step) => {
                    if (step.name === payload.name) {
                        if(step.completed === true) {
                            step.completed = true;
                        }
                    }
                })
            },
            // Executed when @stepper-finished event is triggered
            alert(payload) {
                alert('end')
            }
        },
        mounted(){
            let me = this;
            Swal.fire({
                title: 'Yapea con La Mora Pastelería',
                html: `<p>Gracias Sr(a). <strong><span style="color: #2d57c1;">${me.datos.cliente}</span></strong></p>
                       <p>Puede usar las opciones 1 y 2 de la guia para aprender a yapear a nuestras cuenta, si ya sabe como hacerlo, 
                         puede ir directamente a la opción 3 y hacer poder preparar y despachar 
                         su pedido Nro <strong><span style="color: #2dc22f;">${me.datos.nro_orden}</span></strong></p>`,
                imageUrl: 'img/logo.png',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                })
        }
    }
  
</script>
<style>



</style>