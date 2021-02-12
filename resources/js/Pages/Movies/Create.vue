<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add a movie
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <template>
                <div>
                    <div class="flex bg-white rounded-lg mx-4 md:mx-auto my-6 max-w-md md:max-w-4xl "><!--horizantil margin is just for display-->
                        <div class="flex items-start px-4 py-6">
                            <div>
                                <jet-application-logo class="block h-12 w-auto w-12 h-12 mr-4 rounded-xl" />
                            </div>
                            <div class="">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-lg font-semibold text-gray-900 -mt-1">Add new movie form</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

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
