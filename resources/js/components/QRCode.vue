<template>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="generate_form">
                    <div class="row">
                        <h5>QRCode Generate Form</h5>
                        <div class="form-group col-md-12">
                            <label for="content">Content</label>
                            <input type="text" class="form-control" v-model="content"/>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="content">Size</label>
                            <input type="number" class="form-control" v-model="size"/>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="content">Background Color</label>
                                <color-picker
                                    :color="background_color"
                                    :sucker-hide="false"
                                    @changeColor="changeBgColor"
                                />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="content">Fill Color</label>
                                <color-picker
                                    :color="fill_color"
                                    :sucker-hide="false"
                                    @changeColor="changeFillColor"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="preview">
                    <h5>Preview QR Code</h5>
                    <div class="qr_code">
                        <qrcode-vue
                            :value="content"
                            :size="size"
                            :background="background_color"
                            :foreground="fill_color"
                            level="H" 
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script>
    import QrcodeVue from 'qrcode.vue'
    import colorPicker from '@caohenghu/vue-colorpicker'
    import router from '../router'

    export default {
        name: 'QRCode',
        components: {
            QrcodeVue,
            colorPicker
        },
        data() {
            return {
                content: 'Mvix USA',
                size: 500,
                background_color: "rgba(255,255,255,1)",
                fill_color: "rgba(0,0,0,1)"
            }
        },
        methods: {
            changeBgColor(color) {
                const {rgba: {r, g, b, a}} = color
                this.background_color = `rgba(${r}, ${g}, ${b}, ${a})`
            },
            changeFillColor(color) {
                const {rgba: {r, g, b, a}} = color
                this.fill_color = `rgba(${r}, ${g}, ${b}, ${a})`
            }            
        },
        mounted() {
            if(localStorage.getItem('usertoken') == null) {
                this.auth = '';
                router.push({name: 'Login'});
            }
        }
    }
</script>

<style>
    .container {
        min-width: 1024px;
    }

    .generate_form {
        margin-top: 50px;
    }

    .generate_form .form-group {
        padding-top: 10px;
    }

    .generate_form input {
        height: 37px;
    }

    .hu-color-picker {
        width: 217px!important;
    }

    div.preview {
        margin-top: 50px;
        text-align: center;
    }

    div.preview div.qr_code {
        margin-top: 35px;
    }

    div.backend_qrcode {
        margin-top: 30px;
        margin-bottom: 100px;
    }
</style>