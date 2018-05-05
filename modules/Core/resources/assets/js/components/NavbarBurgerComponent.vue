<template>
    <div class="navbar-burger" @click="toggle" :class="{'is-active': isActive}">
        <span></span>
        <span></span>
        <span></span>
    </div>
</template>

<script>
    export default {
        props: {
            target: null
        },
        data: () => ({
            isActive: false
        }),
        methods: {
            toggle(event) {
                this.isActive = !this.isActive
                let el = document.getElementById(this.target)
                el.classList.toggle('is-active');
            }
        }
    }
</script>
