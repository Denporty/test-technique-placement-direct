<template>
    <label class="block font-medium text-sm text-gray-700 my-2">
        <span>{{ name }}</span>
    </label>
    <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block w-full"
           :class="classname"
           :type="type"
           :min="min"
           :max="max"
           :step="step"
           :value="modelValue"
           @input="$emit('update:modelValue', $event.target.value)"
           ref="input"
           :list="list"
           :id="name"
           :required="required != null"
    >
    <div class="flex justify-between">
        <InputError class="w-full" :message="message"></InputError>
        <span v-if="isTypeText" class="w-full block text-xs text-right">{{ nbChar }} <span v-if="max" class="text-xs">/ {{ max }}</span> caractères</span>
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
        'list': [String],
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
        'min': {
            type: [String, Number],
            default: null
        },
        'max': {
            type: [String, Number],
            default: null
        },
        'message': String
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
