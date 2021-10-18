<template>
    <div class="px-4 py-5 sm:p-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Days Before Date
        </h3>
        <div class="mt-5">
            <div class="px-6 py-5 sm:flex sm:items-start sm:justify-between">
                <div class="flex justify-around sm:items-start w-full">
                    <div class="mt-3 sm:mt-0 sm:ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            Target Date
                        </div>
                        <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                            <input type="date" v-model="targetDate" v-on:change="handleDateChange"/>
                        </div>
                    </div>

                    <div class="mt-5 sm:mt-0 sm:ml-4 flex-1 place-self-center">
                        <div class="w-3/5 ml-5 mx-auto" v-if="numberOfDaysBeforeDate > 0">
                            <div class="rounded bg-gray-200 text-center text-4xl p-5 shadow-inner">
                                {{ numberOfDaysBeforeDate }}
                                <span class="text-sm">days</span>
                            </div>
                            <p class="text-sm text-center">before {{ targetDate }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import useApi from "../composables/use-api";

export default {
    name: "DaysBeforeDateComponent",

    setup() {
        const { fetchFromApi } = useApi()

        const targetDate = ref();
        const numberOfDaysBeforeDate = ref();

        const handleDateChange = async function () {
            await fetchFromApi('date/counter', {
                target_date: targetDate.value
            })
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
