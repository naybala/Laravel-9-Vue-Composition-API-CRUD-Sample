<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" 
        class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="saveCompany">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <CommonLabel for="name" title="Name"></CommonLabel>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.name">
                </div>            
            </div>
            <div>
                <CommonLabel for="email" title="Email"></CommonLabel>
                <div class="mt-1">
                    <input type="text" name="email" id="email"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.email">
                </div>            
            </div>
            <div>
                <CommonLabel for="address" title="Address"></CommonLabel>
                <div class="mt-1">
                    <input type="text" name="address" id="address"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.address">
                </div>        
            </div>
            <div>
                <CommonLabel for="website" title="Website"></CommonLabel>
                <div class="mt-1">
                    <input type="text" name="website" id="website"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.website">
                </div> 
            </div>
        </div>

       <SubmitBtn title="Save"></SubmitBtn>
    </form>
</template>

<script setup>
import { reactive } from "vue";
import useCompanies from "@/composables/companies";
import SubmitBtn from "../common/SubmitBtn.vue";
import CommonLabel from "../common/CommonLabel.vue";

const form = reactive({
    'name': '',
    'email': '',
    'address': '',
    'website': '',
})
const { errors, storeCompany } = useCompanies()
const saveCompany = async () => {
    await storeCompany({ ...form });
}
</script>
