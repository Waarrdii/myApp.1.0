<script setup>
import Dashboard from '@/Pages/Dashboard.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { onMounted, computed } from 'vue';

const props = defineProps({
  product: Object
});

const form = useForm({
    id: props.product?.id,
    name: props.product?.name,
    description: props.product?.description,
    category: props.product?.category,
    buying_price:props.product?.buying_price,
    selling_price:props.product?.selling_price,
    quantity:props.product?.quantity,
});



const submit = () => {
    
};
</script>

<template>
    <Dashboard>
        <Head title="Register" />

        <form >
            <div>
                <InputLabel for="id" value="ID" />

                <TextInput
                    id="id"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.id"
                    required
                    autofocus
                    autocomplete="id"
                />

                <InputError class="mt-2" :message="form.errors.id" />
            </div>

            <div class="mt-4">
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="description" value="Description" />

                <TextInput
                    id="description"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.description"
                    required
                    autocomplete="description"
                />

                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="category"
                    value="category"
                />

                <TextInput
                    id="category"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.category"
                    required
                    autocomplete="category"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.category"
                />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="buying_price"
                    value="buying_price"
                />

                <TextInput
                    id="buying_price"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.buying_price"
                    required
                    autocomplete="buying_price"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.buying_price"
                />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="selling_price"
                    value="selling_price"
                />

                <TextInput
                    id="selling_price"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.selling_price"
                    required
                    autocomplete="selling_price"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.selling_price"
                />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="quantity"
                    value="quantity"
                />

                <TextInput
                    id="quantity"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.quantity"
                    required
                    autocomplete="quantity"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.quantity"
                />
            </div>

            <div class="mt-4 flex items-center justify-end">
            
                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Update
                </PrimaryButton>
            </div>
        </form>
    </Dashboard>
</template>
