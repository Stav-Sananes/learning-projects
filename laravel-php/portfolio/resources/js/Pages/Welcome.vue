<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Frontend from "@/Layouts/Frontend.vue";
import Promote from "../Components/Frontend/Promote.vue";
import About from "@/Components/Frontend/About.vue";
import Skills from "./Skills/Index.vue";
import Portfolio from "@/Components/Frontend/Portfolio.vue";
import Services from "@/Components/Frontend/Services.vue";
import ContactMe from "@/Components/Frontend/ContactMe.vue";

defineProps({
    skills: Object,
    projects: Object,
});
</script>

<template>
    <Head title="Welcome" />

    <Frontend>
        <Hero />
        <Promote />
        <About />
        <Skills :skills="skills" />
        <Portfolio :skills="skills" :projects="projects" />
        <Services />
        <ContactMe />
    </Frontend>
</template>
