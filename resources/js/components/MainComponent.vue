<template>
    <nav class="w-full text-blue-300 text-center">
        <router-link :to="{ name: 'Days Before Date' }" class="hover:text-white">
            Days Before Date
        </router-link>
        |
        <router-link :to="{ name: 'Difference Between Dates' }" class="hover:text-white">
            Difference Between Dates
        </router-link>
        | Random Number
        | Random Pick
    </nav>

    <div class="mt-16 flex justify-center items-center">
        <div class="bg-gray-50 shadow sm:rounded-lg w-2/5 shadow-lg">
            <router-view />
        </div>
    </div>
</template>

<script>
export default {
    name: "MainComponent",
}
</script>

<style scoped>

</style>
