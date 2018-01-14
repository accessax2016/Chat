<template>
    <div class="message">
        <li class="list-group-item" :class="messageClass"><slot></slot></li>
        <small>{{ time }}</small>
        <small class="badge float-right" :class="badgeClass">{{ user }}</small>
        <br>
    </div>
</template>

<script>
    export default {
        props: [
            'color',
            'user',
            'time'
        ],

        computed: {
            messageClass() {
                return "list-group-item-" + this.color;
            },
            badgeClass() {
                return "badge-" + this.color;
            },
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style type="text/css">
    .message {
        padding: 0px 15px;
    }
</style>
