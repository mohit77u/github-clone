import './bootstrap';

import { createApp } from 'vue';
// console.log(import.meta.env.VITE_GITHUB_ACCESS_TOKEN)

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */
 


const app = createApp({});

import AppComponent from './src/AppComponent.vue';
app.component('app-component', AppComponent);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

import router from './src/routes/routes'

import { createPinia } from 'pinia'
const pinia = createPinia()

app.use(router)
.use(pinia)
.mount('#app');


$(function(){
    // function to remove or add elements from menu
    function addOrRemoveElement() {
        // get window width
        var windowWidth = $(window).width();

        // get li element width
        var elementWidth = $('#menu1 li').width();
        var menu1array = [];
        var menu2array = [];
        var allArray   = [];

        // push all menu1 li to all array
        $('#menu1 li').each((index, elem) => {
            allArray.push($(elem));
        })
        // push all menu2 li to all array
        $('#menu2 li').each((index, elem) => {
            allArray.push($(elem));
        })
        // populate to menu1 from all array
        $(allArray).each((index, elem) => {
            $(elem).appendTo('#menu1');
        })

        // add and remove the data to menu 2
        $('#menu1 li').each(function(index, elem){
            var myposition = $(elem).position();
            var leftPosition = myposition.left + elementWidth * 4;
            $(elem).find('a').removeClass('justify-center')
            $(elem).find('a').addClass('justify-start')
            var hide = (leftPosition > windowWidth);

            // add or remove the data if width is greater than window width except last two elements
            if(hide && index != 0 && index != 1 ){
                menu2array.push($(elem));
            } else {
                menu1array.push($(elem));
            }
        });

        // add to menu1
        $(menu1array).each(function(index, elem){
            $(elem).appendTo('#menu1');
        });

        // add to menu2
        $(menu2array).each(function(index, elem){
            $(elem).appendTo('#menu2');
        });

        // removeClass and addClass if not have any element in menu2array
        if(menu2array.length == 0){
            $('.menu-icon-div').addClass('hidden')
        } else {
            $('.menu-icon-div').removeClass('hidden')
        }
    } 

    // on resize window call function
    $(window).resize(function() {
        addOrRemoveElement();
    });

    // on load page call function
    $(document).ready(function() {
        addOrRemoveElement();
    });
    

})