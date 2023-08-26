<template>
    <div class="flex items-center" :class="classname">
        <label class="block font-medium text-sm text-gray-700 my-2 mr-4">
            <span>{{ label }}</span>
        </label>
        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
            <input v-model="proxyChecked" :value="value" type="checkbox" @click="$emit('click', $event.target.checked)" :name="name" :id="name" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
            <label :for="name" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
        </div>
    </div>
    <InputError :message="message"/>
</template>

<script>
import InputError from "@/Components/InputError.vue";
export default {
    components: {InputError},
    emits: ['update:checked', 'click'],

    props: {
        checked: {
            type: [Array, Boolean],
            default: false,
        },
        value: {
            default: null,
        },
        'label': [String],
        'name': [String],
        'classname': [String],
        'message': String
    },

    computed: {
        proxyChecked: {
            get() {
                return this.checked;
            },

            set(val) {
                this.$emit("update:checked", val);
            },
        },
    },
}
</script>
<style lang="scss" scoped>
/**
Checkbox
*/
.toggle-checkbox {
    @apply border-gray-300 #{!important};
    &:checked {
        @apply right-0 border-green-400 bg-white #{!important};
    }
    &:focus {
        @apply shadow-none ring-0 ring-offset-0 #{!important};
    }
}
.toggle-checkbox:checked + .toggle-label {
    @apply bg-green-400 #{!important};
}
</style>
