<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add a movie
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <create-movie-form :user="$page.props.user" />
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import CreateMovieForm from './CreateMovieForm'

    export default {
        components: {
            AppLayout,
            CreateMovieForm,
        },
    }
</script>
