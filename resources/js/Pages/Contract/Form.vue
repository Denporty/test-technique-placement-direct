<template>
    <AuthenticatedLayout>
        <Modal :show="showModal" type="danger">
            <div class="font-bold text-xl leading-none p-4">Êtes-vous sûr de vouloir supprimer le contrat {{ props.contract?.data.title }} ?
            </div>
            <div class="flex my-2 justify-center p-8">
                <Button @click="showModal = false"
                        type="button"
                        class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mx-2">Non
                </Button>
                <Button @click="deleteContract"
                        type="button"
                        class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded mx-2">Oui
                </Button>
            </div>
        </Modal>
        <div class="w-full px-4 py-6">
            <div class="my-2">
                <Input label="Titre du contrat" name="title" v-model="form.title" :message="form.errors.title"/>
            </div>
            <div class="my-2">
                <TextArea label="Contenu du contrat" name="content" v-model="form.content" :message="form.errors.content"></TextArea>
            </div>
            <div class="my-2">
                <Select label="Utilisateur lié" name="user_id" v-model="form.user_id" :message="form.errors.user_id" :options="props.users"/>
            </div>
            <div class="my-2">
                <label for="pdf">PDF du contrat</label>
                <input type="file" id="pdf" name="pdf" :message="form.errors.pdf" @change="handleFileUpload">
            </div>
            <div class="my-2">
                <label>Fichier PDF du contrat</label>
                <object :data="`/storage/pdfs/${props.contract.data.pdf}`" type="application/pdf" width="100%" height="600px">
                    <p>Le navigateur ne peut pas afficher ce PDF. <a :href="`/storage/pdfs/${props.contract.data.pdf}`">Cliquez ici pour le télécharger.</a></p>
                </object>
            </div>
            <div class="flex py-4">
                <Button @click="submitForm" class="bg-blue-500 hover:bg-blue-700">
                    Sauvegarder
                </Button>
                <Button @click="showModal = true" class="bg-red-500 hover:bg-red-700 ml-4">
                    Supprimer
                </Button>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import Input from '@/Components/Input.vue'
import Button from '@/Components/Button.vue'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Select from "@/components/Select.vue";
import TextArea from "@/components/TextArea.vue";
import Modal from "@/components/Modal.vue";
import {defineProps, ref} from "vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    contract: Object,
    users: Object
})

const form = useForm({
    title: props.contract?.data.title ?? null,
    content: props.contract?.data.content ?? null,
    user_id: props.contract?.data.user_id ?? null,
    is_sign: props.contract?.data.is_sign ?? null,
    pdf: props.contract?.data.pdf ?? null,
});

let showModal = ref(false)

function submitForm() {

    if(props.contract?.data.id) form.post(route('contracts.update', [props.contract?.data.id]))
    else form.post(route('contracts.store'))
}

function deleteContract(){
    form.delete(route('contracts.destroy', [props.contract?.data.id]))
}

function handleFileUpload(event) {
    const file = event.target.files[0];
    form.pdf = file;
}
</script>
