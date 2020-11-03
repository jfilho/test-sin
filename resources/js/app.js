/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueTheMask from 'vue-the-mask';

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.use(VueTheMask);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: function() {
        return {
            search_message: 'Digite o CEP para consulta.'
        }
    },
    methods: {
        getzipcode: function () {
            this.search_message = 'Buscando...';
            var that = this;
            const zipcode = document.getElementById("cep").value.replace(/\D/g, '');
            axios.get(`https://viacep.com.br/ws/${zipcode}/json/`)
                .then(function(response ) {
                    if (response.data.erro) {
                        that.search_message = 'Erro ao realizar consulta.';
                        document.getElementById('logradouro').value = '';
                        document.getElementById('complemento').value = '';
                        document.getElementById('bairro').value = '';
                        document.getElementById('cidade').value = '';
                        document.getElementById('uf').value = '';
                    } else {
                        that.search_message = 'Digite o CEP para consulta.';
                        document.getElementById('logradouro').value = response.data.logradouro;
                        document.getElementById('complemento').value = response.data.complemento;
                        document.getElementById('bairro').value = response.data.bairro;
                        document.getElementById('cidade').value = response.data.localidade;
                        document.getElementById('uf').value = response.data.uf;
                    }
                });
        }
    }
});
