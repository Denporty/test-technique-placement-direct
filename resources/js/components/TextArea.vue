<template>
    <label class="block font-medium text-sm text-gray-700 my-2">
        <span>{{ label }}</span>
    </label>
    <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block w-full"
           :disabled="disabled"
           :class="classname"
           :value="modelValue"
           @input="$emit('update:modelValue', $event.target.value)"
           ref="input"
           :id="name"
           :required="required != null"
    ></textarea>
    <div class="flex justify-between">
        <InputError class="w-full" :message="message"></InputError>
    </div>
</template>

<script>
import InputError from "@/Components/InputError.vue";
export default {
    components: {
        InputError,
    },
    props: {
        'modelValue': [String, Number, Boolean],
        'name': [String],
        'label': [String],
        'classname': [String],
        'step': [String],
        'type': {
            type: [String],
            default: 'text'
        },
        'required': {
            type: [String],
            default: null
        },
        'message': String,
        'disabled': Boolean,
    },
    emits: ['update:modelValue'],
    computed:{
        nbChar(){
            if (this.modelValue == null) return 0
            return this.modelValue.length
        },
        isTypeText(){
            return this.type === 'text'
        }
    },
    methods: {
        focus() {
            this.$refs.input.focus()
        },
    }
}
</script>
