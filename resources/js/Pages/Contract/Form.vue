<template>
    <AuthenticatedLayout>
        <div class="w-full px-4 py-6">
            <div class="my-2">
                <Input label="Titre du contrat" name="title" v-model="form.title" :message="form.errors.title"/>
            </div>
            <div class="my-2">
                <Input label="Contenu du contrat" name="content" v-model="form.content" :message="form.errors.content"/>
            </div>
            <div class="my-2">
                <Select label="Utilisateur lié" name="user_id" v-model="form.user_id" :message="form.errors.user_id" :options="users"/>
            </div>
            <div class="flex py-4">
                <Button @click="submitForm" class="bg-blue-500 hover:bg-blue-700">
                    Sauvegarder
                </Button>
<!--                <Button v-if="contract?.id" @click="showModal = true" class="bg-red-500 hover:bg-red-700 ml-4">-->
<!--                    Supprimer-->
<!--                </Button>-->
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import Input from '@/Components/Input.vue'
import Button from '@/Components/Button.vue'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Select from "@/components/Select.vue";
export default {
    name: 'Form',
    components: {
        Select,
        AuthenticatedLayout,
        Input,
        Button,
    },
    props: {
        contract: Object,
        users: Object
    },
    data() {
        return {
            form: this.$inertia.form({
                title: this.contract?.data.title ?? null,
                content: this.contract?.data.content ?? null,
                user_id: this.contract?.data.user_id ?? null,
            }),
            showModal: false
        }
    },
    methods: {
        submitForm() {
            if(this.contract?.data.id) this.form.post(route('contracts.update', [this.contract?.data.id]))
            else this.form.post(route('contracts.store'))
            // if(this.contract?.data.id) console.log('toto')
            // else console.log('tata')

        },
    }
}
</script>
