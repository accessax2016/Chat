<template>
    <div :style="MessageStyle">
        <li class="list-group-item" :class="messageClass"><slot></slot></li>
        <small class="badge float-right" :class="badgeClass">You</small>
        <br>
    </div>
</template>

<script>
    export default {
        props: [
            'color',
            'format'
        ],

        computed: {
            MessageStyle() {
                return this.format;
            },
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
