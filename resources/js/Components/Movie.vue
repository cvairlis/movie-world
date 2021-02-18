<template>
    <div>
        <div class="bg-white rounded-lg shadow mx-4 md:mx-auto my-6 max-w-md md:max-w-2xl">
            <div class="flex justify-between px-6 py-6">
                <div>
                    <jet-application-logo class="block h-12 w-auto w-12 h-12 mr-4 rounded-xl" />
                </div>
                 <div class="items-start">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">{{ movie.title }}</h2>
                    </div>
                    <div>
                        <p v-if="movie.subtitle" class="text-gray-700"> {{ movie.subtitle }} </p>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <small class="text-sm text-gray-700">Added at: {{ movie.created_at}}</small>
                    </div>
                </div>
            </div>

            <div class="px-6">
                <div>
                    <p class="mt-3 text-gray-700 text-sm text-center"> {{ movie.description }} </p>
                </div>
            </div>

            <div class="flex justify-between px-6 py-6">
                <div class="flex flex-wrap content-end">
                    <div class="mt-4 flex items-center">
                        <!-- likes -->
                        <like-button :likes="movie.likes" />

                        <!-- hates -->
                        <hate-button :hates="movie.hates" />

                        <!-- loves -->
                        <love-button :loves="movie.loves" />
                    </div>
                </div>
                <div class="flex flex-wrap content-end">
                    <small class="text-sm text-gray-700 pl-6">Posted by: {{ movie.user.name }} </small>
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
