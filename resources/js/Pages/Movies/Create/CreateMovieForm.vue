<template>
    <jet-form-section @submitted="createMovieRecord">
        <template #title>
            Add a new movie
        </template>

        <template #description>
            You can create a movie record. Use the following form to post your favorite movie.
        </template>

        <template #form>
            <!-- Title -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="title" value="Title" />
                <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="title" />
                <jet-input-error :message="form.errors.title" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="description" value="Description" />
                <jet-textarea id="description" type="textarea" class="mt-1 block w-full" v-model="form.description" autocomplete="description" />
                <jet-input-error :message="form.errors.description" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetTextarea from '@/Jetstream/Textarea'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetTextarea,
            JetInputError,
            JetLabel,
        },

        props: ['user'],

        data() {
            return {
                form: this.$inertia.form({
                    title: '',
                    description: '',
                })
            }
        },

        methods: {
            createMovieRecord() {
                this.form.post(route('movie.create.store'), {
                    errorBag: 'createMovieRecord',
                    preserveScroll: true,
                    onSuccess: () => this.form.reset(),
                })
            },
        },
    }
</script>
