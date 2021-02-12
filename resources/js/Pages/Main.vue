<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Movie World
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <movie />
                <movie />
                <movie />
                <movie />
                <movie />
                <movie />
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Movie from '@/Components/Movie'

    export default {
        components: {
            AppLayout,
            Movie,
        },
    }
</script>
