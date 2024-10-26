<script setup>
import Dashboard from '@/Pages/Dashboard.vue';
import Table from '@/Components/Table.vue';
import TableBodyHeader from '@/Components/TableBodyHeader.vue';
import TableData from '@/Components/TableData.vue';
import TableRow from '@/Components/TableRow.vue';
import TableHeader from '@/Components/TableHeader.vue';
import { Link } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import { ref, computed  } from 'vue';


const props = defineProps({
  products: Array
});

const selectedProducts = ref([]);

const isDisabled = computed(() => {
  return selectedProducts.value.length === 0;
});

const submit = () => {
  console.log(selectedProducts.value);
};

const deleteProduct = () => {
    // Lakukan sesuatu dengan ID produk yang terpilih, misalnya kirim ke server
    console.log(selectedProducts.value);
    // Kirim ke server menggunakan AJAX atau form submission
};

</script>

<template>
    <Dashboard>
        <div class="my-4 uppercase">
            <Link
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                :href="route('products.create')">Create</Link>
            <Link :class="{
                'pointer-events-none  opacity-50 bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600': isDisabled,
                'focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900': !isDisabled
                }" 
                 @click="deleteProduct"
                :href="route('products.index')">Delete</Link>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg select-text">

            <Table>
                <template #header>
                    <TableHeader>ID</TableHeader>
                    <TableHeader>name</TableHeader>
                    <TableHeader>description</TableHeader>
                    <TableHeader>category</TableHeader>
                    <TableHeader>buying_price</TableHeader>
                    <TableHeader>selling_price</TableHeader>
                    <TableHeader>quantity</TableHeader>
                    <TableHeader>Select</TableHeader>
                </template>
                <template #default>
                    <TableRow v-for="item in products" :key="item.id">
                        <TableData>{{ item.id }}</TableData>
                        <TableBodyHeader>
                            <Link :href="route('products.edit', { id: item.id })">
                            {{ item.name }}
                            </Link>
                        </TableBodyHeader>
                        <TableData>{{ item.description }}</TableData>
                        <TableData>{{ item.category }}</TableData>
                        <TableData class="text-end">{{ item.buying_price }}</TableData>
                        <TableData class="text-end">{{ item.selling_price }}</TableData>
                        <TableData class="text-end">{{ item.quantity }}</TableData>
                        <TableData class="text-center">
                            <Checkbox v-model:checked="selectedProducts" :value="item.id" />
                        </TableData>
                    </TableRow>

                </template>
            </Table>
            <!-- <pre>{{ users }}</pre> -->
        </div>
    </Dashboard>
</template>



<style lang="scss" scoped></style>