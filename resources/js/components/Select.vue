<template>
    <label class="block font-medium text-sm text-gray-700 my-2">
        <span>{{ name }}</span>
    </label>
    <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block w-full"
            :class="classname"
            @change="$emit('update:modelValue', $event.target.value)"
            :value="modelValue"
            :required="required != null"
    >
        <template v-for="(value, key) in options" :key="key">
            <option :value="key">{{ value }}</option>
        </template>
    </select>
    <InputError :message="message"></InputError>
</template>

<script>
import InputError from "@/Components/InputError.vue";
export default {
    components: {InputError},
    props: {
        'modelValue': [String, Number, Boolean],
        'name': [String],
        'label': [String],
        'classname': [String],
        'required': {
            type: [String],
            default: null
        },
        'default': String,
        'message': String,
        'options': Object,
    },
    emits: ['update:modelValue'],
    methods: {
        focus() {
            this.$refs.input.focus()
        },
    },
}
</script>

<style scoped>

</style>
