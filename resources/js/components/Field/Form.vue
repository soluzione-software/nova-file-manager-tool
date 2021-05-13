<template>
    <div>
        <default-field :field="field" :errors="errors" :show-help-text="showHelpText">
            <template slot="field">
                <div class="flex items-center">
                    <input
                        class="w-full form-control form-input form-input-bordered"
                        @input="handleChange"
                        :value="value"
                        :id="field.attribute"
                        :dusk="field.attribute"
                        v-bind="extraAttributes"
                        :disabled="isReadonly"
                        :list="`${field.attribute}-list`"
                    />

                    <button
                        class="ml-2 text-80 hover:text-90"
                        title="Select from file manager"
                        @click.prevent="openModal"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="24" height="24" viewBox="0 0 24 24"
                             stroke="currentColor" class="align-middle">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                    </button>
                </div>
            </template>
        </default-field>

        <portal to="modals" transition="fade-transition">
            <modal
                v-if="modalOpen"
                width="800"
                @modal-close="closeModal"
            >
                <div
                    class="rounded-lg shadow-lg"
                    style="width: 900px; height: 70vh; max-width: 100vw; min-height: 500px"
                >
                    <iframe :src="url" class="border-0 w-full h-full"></iframe>
                </div>
            </modal>
        </portal>
    </div>
</template>

<script>

import {FormField, HandlesValidationErrors} from 'laravel-nova'

export default {
    mixins: [HandlesValidationErrors, FormField],

    props: ['resourceName', 'field'],

    data() {
        return {
            modalOpen: false,
        }
    },

    methods: {
        openModal() {
            window.SetUrl = items => {
                this.closeModal();

                this.value = items[0].url;
            };

            this.modalOpen = true;
        },

        closeModal() {
            this.modalOpen = false;

            delete window.SetUrl;
        },
    },

    computed: {
        defaultAttributes() {
            return {
                type: 'text',
                placeholder: this.field.placeholder || this.field.name,
                class: this.errorClasses,
            }
        },

        extraAttributes() {
            const attrs = this.field.extraAttributes

            return {
                // Leave the default attributes even though we can now specify
                // whatever attributes we like because the old number field still
                // uses the old field attributes
                ...this.defaultAttributes,
                ...attrs,
            }
        },

        url() {
            return this.field.url + '?callback=SetUrl';
        },
    },
}
</script>
