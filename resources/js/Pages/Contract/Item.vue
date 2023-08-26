<template>
    <AuthenticatedLayout>
        <div class="flex flex-col">
            <h1 class="font-bold text-2xl my-4">{{ props.contract.data.title }}</h1>
            <p>{{ props.contract.data.content }}</p>
            <object :data="`/storage/pdfs/${props.contract.data.pdf}`" type="application/pdf" width="100%" height="600px">
                <p>Le navigateur ne peut pas afficher ce PDF. <a :href="`/storage/pdfs/${props.contract.data.pdf}`">Cliquez ici pour le télécharger.</a></p>
            </object>
        </div>
        <div class="my-2">
            <Checkbox label="Signer" name="is_sign" v-model:checked="form.is_sign" :value="form.is_sign" :message="form.errors.is_sign"/>
        </div>
        <Button @click="submitForm">
            Sauvegarder
        </Button>
    </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Checkbox from "@/components/Checkbox.vue";
import Button from "@/components/Button.vue";
import {useForm} from "@inertiajs/vue3";
import {defineProps} from "vue";

const props = defineProps({
    contract: Object
})

const form = useForm({
    is_sign: props.contract?.data.is_sign ?? null,
});

function submitForm() {
    form.post(route('contracts.sign', [props.contract?.data.id]))
}
</script>
