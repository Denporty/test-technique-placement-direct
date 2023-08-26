<template>
    <Head title="Liste des contrats" />
    <AuthenticatedLayout>
        <a v-if="$page.props.auth.user.administrator" class="my-4 bg-gray-800 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('contracts.create')">
            Créer un contrat
        </a>


        <div class="relative overflow-x-auto">
            <ContractArray :contracts="props.contracts"></ContractArray>
        </div>


    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ContractArray from "@/components/ContractArray.vue";
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    contracts: {
        type: Array,
        default: null,
    },
})
</script>

<style lang="scss">

</style>
