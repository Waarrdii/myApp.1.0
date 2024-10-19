<script setup>
import Dashboard from '@/Pages/Dashboard.vue';
import Table from '@/Components/Table.vue';
import TableBodyHeader from '@/Components/TableBodyHeader.vue';
import TableData from '@/Components/TableData.vue';
import TableRow from '@/Components/TableRow.vue';
import TableHeader from '@/Components/TableHeader.vue';

defineProps(['products']);

</script>

<template>
    <Dashboard>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <Table>
                <template #header>
                    <TableHeader>ID</TableHeader>
                    <TableHeader>name</TableHeader>
                    <TableHeader>description</TableHeader>
                    <TableHeader>category</TableHeader>
                    <TableHeader>buying_price</TableHeader>
                    <TableHeader>selling_price</TableHeader>
                    <TableHeader>quantity</TableHeader>
                </template>
                <template #default>
                    <TableRow v-for="item in products" :key="item.id">
                        <TableData>{{ item.id }}</TableData>
                        <TableBodyHeader>{{ item.name }}</TableBodyHeader>
                        <TableData>{{ item.description }}</TableData>
                        <TableData>{{ item.category }}</TableData>
                        <TableData>{{ item.buying_price }}</TableData>
                        <TableData>{{ item.selling_price }}</TableData>
                        <TableData>{{ item.quantity }}</TableData>
                    </TableRow>
                        
                </template>
            </Table>   
                <!-- <pre>{{ users }}</pre> -->
        </div>
    </Dashboard>
</template>



<style lang="scss" scoped>

</style>