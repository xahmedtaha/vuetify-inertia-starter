<script setup>
import { VuePreloader } from 'vue-preloader';

defineProps({
    usePreloader: {
        type: Boolean,
        default: false,
    },
    transition: {
        type: String,
        default: 'slide-y-transition',
    }
});
</script>
<template>
    <transition :name="transition" mode="out-in" appear>
        <div :key="$page.url">
            <slot />
        </div>
    </transition>
    <VuePreloader v-if="usePreloader" />
</template>
