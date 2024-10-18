<script setup>
import Dashboard from '@/Pages/Dashboard.vue';
import Table from '@/Components/Table.vue';
import TableBodyHeader from '@/Components/TableBodyHeader.vue';
import TableData from '@/Components/TableData.vue';
import TableRow from '@/Components/TableRow.vue';
import TableHeader from '@/Components/TableHeader.vue';

defineProps(['users']);

</script>

<template>
    <Dashboard>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <Table>
                <template #header>
                    <TableHeader>User ID</TableHeader>
                    <TableHeader>Name</TableHeader>
                    <TableHeader>Email</TableHeader>
                    <TableHeader>Role</TableHeader>
                </template>
                <template #default>
                    <TableRow v-for="user in users" :key="user.id">
                        <TableData>{{ user.id }}</TableData>
                        <TableBodyHeader>{{ user.name }}</TableBodyHeader>
                        <TableData>{{ user.email }}</TableData>
                        <TableData>
                            <ul>
                                <li v-for="role in user.roles" :key="role.id">{{ role }}</li>
                            </ul>
                        </TableData>
                    </TableRow>
                        
                </template>
            </Table>   
                <!-- <pre>{{ users }}</pre> -->
        </div>
    </Dashboard>
</template>



<style lang="scss" scoped>

</style>