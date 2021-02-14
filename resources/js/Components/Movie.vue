<template>
    <div>
        <div class="flex bg-white rounded-lg mx-4 md:mx-auto my-6 max-w-md md:max-w-4xl "><!--horizantil margin is just for display-->
            <div class="flex items-start px-4 py-6">
                <div>
                    <jet-application-logo class="block h-12 w-auto w-12 h-12 mr-4 rounded-xl" />
                </div>
                <div class="">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{ movie.title }}</h2>
                        <small class="text-sm text-gray-700">Added at: {{ movie.created_at}}</small>
                    </div>
                    <p v-if="movie.subtitle" class="text-gray-700"> {{ movie.subtitle }} </p>
                    <p class="mt-3 text-gray-700 text-sm"> {{ movie.description }} </p>
                    <div class="mt-4 flex items-center">
                        <!-- likes -->
                        <like-button :likes="movie.likes" />

                        <!-- hates -->
                        <hate-button :hates="movie.hates" />

                        <!-- loves -->
                        <love-button :loves="movie.loves" />

                        <small class="text-sm text-gray-700 pl-6">Posted by: {{ movie.user.name }} </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'
    import LikeButton from './LikeButton'
    import HateButton from './HateButton'
    import LoveButton from './LoveButton'

    export default {
        components: {
            JetApplicationLogo,
            LikeButton,
            HateButton,
            LoveButton
        },

        props: ['movie'],
    }
</script>
