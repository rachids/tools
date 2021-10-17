<template>
    <div class="bg-white shadow sm:rounded-lg w-2/5">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Days Before Date
            </h3>
            <div class="mt-5">
                <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                    <h4 class="sr-only">Visa</h4>
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 sm:mt-0 sm:ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                Target Date
                            </div>
                            <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                                <input type="date" v-model="targetDate" v-on:change="handleDateChange"/>
                            </div>
                        </div>

                        <div class="mt-5 sm:mt-0 sm:ml-4">
                            <span v-if="numberOfDaysBeforeDate > 0">
                                {{ numberOfDaysBeforeDate }} days before {{ targetDate }}
                            </span>
                            <span v-else>
                                Please choose a date
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import api from "../composables/use-api";

export default {
    name: "ExampleComponent",

    setup() {
        const targetDate = ref();
        const numberOfDaysBeforeDate = ref();

        const handleDateChange = async function () {
            await api.get('date/counter?target_date=' + targetDate.value)
                .then(
                    response => numberOfDaysBeforeDate.value = response.data.data
                );
        }

        return {
            targetDate,
            numberOfDaysBeforeDate,
            handleDateChange,
        }
    },
}
</script>

<style scoped>

</style>
