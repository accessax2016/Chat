
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// ES6
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout: 5000})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('message-component', require('./components/MessageComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
    	message: '',
    	chatbox: {
    		message: [],
            user: [],
            color: [],
            time: []
    	},
        typing: '',
        numberOfUsers: 0
    },

    watch: {
        message(){
            Echo.private('chat')
            .whisper('typing', {
                message: this.message
            });
        }
    },

    methods: {
    	send() {
    		if (this.message.length != 0) {
    			this.chatbox.message.push(this.message);
                this.chatbox.user.push('You');
                this.chatbox.color.push('success');
                this.chatbox.time.push(this.getTime());

                axios.post('/send', {
                    message: this.message
                })
                .then(response => {
                    console.log(response);
                    this.message = '';
                })
                .catch(error => {
                    console.log(error);
                });
    		}
    		
    	},
        getTime() {
            let time = new Date();
            return time.getHours() + ':' + time.getMinutes() + ':' + time.getSeconds();
        }
    },

    mounted() {
        Echo.private('chat')
        .listen('Event', (e) => {
            this.chatbox.message.push(e.message);
            this.chatbox.user.push(e.user);
            this.chatbox.color.push('primary');
            this.chatbox.time.push(this.getTime());
            // console.log(e);
        })
        .listenForWhisper('typing', (e) => {
            if (e.message != '') {
                this.typing = 'typing...';
            }
            else {
                this.typing = '';
            }
        });

        Echo.join(`chat`)
        .here((users) => {
            this.numberOfUsers = users.length;
            // console.log(users);
        })
        .joining((user) => {
            this.$toaster.success(user.name + ' is joining the chat room');
            this.numberOfUsers++;
            // console.log(user.name);
        })
        .leaving((user) => {
            this.$toaster.warning(user.name + ' is leaving the chat room');
            this.numberOfUsers--;
            // console.log(user.name);
        });
    }
});
