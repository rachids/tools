<template>
    <div class="px-4 py-5 sm:p-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Difference Between Dates
        </h3>
        <div class="mt-5">
            <div class="px-6 py-5 sm:flex sm:items-start sm:justify-between">
                <div class="flex justify-between sm:items-start w-full">
                    <div class="mt-3 sm:mt-0 sm:ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            From
                        </div>
                        <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                            <input type="date" v-model="fromDate"/>
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            To
                        </div>
                        <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                            <input type="date" v-model="toDate"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button @click="handleCalculation" class="bg-blue-500 p-1 text-xs rounded text-white font-bold">
                    Calculate
                </button>
            </div>

            <div class="mt-5 flex content-center w-full" v-if="numberOfDaysBeforeDate > 0">
                <div class="w-3/5">
                    <div class="rounded bg-gray-200 text-center text-4xl p-5 shadow-inner">
                        {{ numberOfDaysBeforeDate }}
                        <span class="text-sm">days</span>
                    </div>
                    <p class="text-sm text-center">between {{ fromDate }} and {{ toDate}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import useApi from "../composables/use-api";

export default {
    name: "DifferenceBetweenDatesComponent",

    setup() {
        const { fetchFromApi } = useApi();

        const fromDate = ref();
        const toDate = ref();
        const numberOfDaysBeforeDate = ref();

        const handleCalculation = async function () {
            await fetchFromApi('date/diff', {
                start: fromDate.value,
                end: toDate.value,
            })
                .then(
                    response => numberOfDaysBeforeDate.value = response.data.data
                );
        }

        return {
            fromDate,
            toDate,
            numberOfDaysBeforeDate,
            handleCalculation,
        }
    },
}
</script>

<style scoped>

</style>
