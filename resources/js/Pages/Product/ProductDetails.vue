<script setup>
import Dashboard from '@/Pages/Dashboard.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const link = route().current();

const props = defineProps({
    product: Object
});


const form = useForm({
    id: '',
    name: '',
    description: '',
    category: '',
    buying_price: '',
    selling_price: '',
    quantity: '',
});

onMounted(() => {
  if (props.product) {
    form.id = props.product?.id;
    form.name = props.product?.name || '';
    form.description = props.product?.description || '';
    form.category = props.product?.category || '';
    form.buying_price = props.product?.buying_price || '';
    form.selling_price = props.product?.selling_price || '';
    form.quantity = props.product?.quantity || '';
  }
 
});

const submit = () => {
    if (link === 'products.edit') {
        form.put(route('products.update', form.id));
    } else if (link === 'products.create') {
        form.post(route('products.store'));
    }
};
</script>

<template>
    <Dashboard>

        <Head title="Register" />



        <form @submit.prevent="submit"
        class="max-w-sm mx-auto">
            <div class="mb-5">
                <label for="id" class="label-class">ID</label>
                <input type="text" id="id" v-model="form.id"
                    class="input-class"
                    placeholder="" required />
            </div>
            <div class="mb-5">
                <label for="name" class="label-class">PRODUCT
                    NAME</label>
                <input type="text" id="name" v-model="form.name"
                    class="input-class"
                    required />
            </div>

            <button type="submit"
                class="button-class"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
                >save</button>
            
        </form>


    </Dashboard>
</template>

<style lang="scss" scoped>

.label-class {
    @apply block mb-2 text-sm font-medium text-gray-900 dark:text-white
}

.input-class {
    @apply bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
}

.button-class {
    @apply text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
}
</style>