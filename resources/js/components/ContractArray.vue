<template>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Titre
            </th>
            <th scope="col" class="px-6 py-3">
                Utilisateur
            </th>
            <th scope="col" class="px-6 py-3">
                Signé
            </th>
            <th scope="col" class="px-6 py-3">
                Editer
            </th>
        </tr>
        </thead>
        <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="item in contracts">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ item.title }}
            </th>
            <td class="px-6 py-4">
                {{ item.user_id }}
            </td>
            <td class="px-6 py-4">
                {{ item.is_sign ? 'Oui' : 'Non' }}
            </td>
            <td class="px-6 py-4">
                <a :href="route('contracts.edit', [item.id])">
                    <div class="w-4 mr-2 transform">
                        <svg clip-rule="evenodd" height="24px" fill="#fff" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m19 20.25c0-.402-.356-.75-.75-.75-2.561 0-11.939 0-14.5 0-.394 0-.75.348-.75.75s.356.75.75.75h14.5c.394 0 .75-.348.75-.75zm-12.023-7.083c-1.334 3.916-1.48 4.232-1.48 4.587 0 .527.46.749.749.749.352 0 .668-.137 4.574-1.493zm1.06-1.061 3.846 3.846 8.824-8.814c.195-.195.293-.451.293-.707 0-.255-.098-.511-.293-.706-.692-.691-1.742-1.741-2.435-2.432-.195-.195-.451-.293-.707-.293-.254 0-.51.098-.706.293z" fill-rule="nonzero"/></svg>
                    </div>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script setup>
const props = defineProps({
    contracts: Array
})
</script>
