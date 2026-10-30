<script setup>
import Projects from "./Projects.vue";
defineProps({
    skills: Object,
    projects: Object,
});
</script>

<template>
    <section
        id="portfolio"
        class="section bg-light-primary dark:bg-dark-primary min-h-[1400px]"
    >
        <div class="container mx-auto">
            <div class="fex flex-col items-center text-center">
                <h2 class="section-title">My Latest Work</h2>
            </div>
        </div>
        <Projects :skills="skills" :projects="projects" />
    </section>
</template>
