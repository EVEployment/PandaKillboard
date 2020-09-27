<template>
    <div id="app">
        <Navbar />
        <b-container class="mt-3" id="content">
            <slot />
        </b-container>
    </div>
</template>

<script>
import Navbar from './Components/Navbar'
export default {
    components: {
        'Navbar': Navbar
    }
}
</script>
