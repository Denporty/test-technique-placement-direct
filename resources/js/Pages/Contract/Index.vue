<template>
    <AuthenticatedLayout>
        <a :href="route('contracts.create')">
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

const props = defineProps({
    contracts: {
        type: Array,
        default: null,
    },
})
</script>

<style lang="scss">

</style>
