<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" v-on:submit.prevent="saveCompany">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="company.name">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input type="text" name="email" id="email"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="company.email">
                </div>
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <div class="mt-1">
                    <input type="text" name="address" id="address"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="company.address">
                </div>
            </div>
            <div>
                <CommonLabel for="website" title="Website"></CommonLabel>
                <div class="mt-1">
                    <input type="text" name="website" id="website"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="company.website">
                </div>
            </div>
        </div>

        <SubmitBtn title="Update"></SubmitBtn>

    </form>
</template>

<script setup>
import useCompanies from "@/composables/companies";
import { onMounted } from "vue";
import SubmitBtn from "../common/SubmitBtn.vue";
import CommonLabel from "../common/CommonLabel.vue";
import CommonInput from "../common/CommonInput.vue";


const { errors, company, getCompany, updateCompany } = useCompanies()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(getCompany(props.id))

const saveCompany = async () => {
    await updateCompany(props.id)
}
</script>
