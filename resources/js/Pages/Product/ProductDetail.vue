<script setup>
import Dashboard from '@/Pages/Dashboard.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import NumberInput from '@/Components/NumberInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const props = defineProps({
  product: Object
});

const form = useForm({
    id: '',
    name: '',
    description: '',
    category: '',
    buying_price:0,
    selling_price:0,
    quantity:0,
});

onMounted(() => {
  if (props.product) {
    form.id = props.product?.id;
    form.name = props.product?.name || '';
    form.description = props.product?.description || '';
    form.category = props.product?.category || '';
    form.buying_price = props.product?.buying_price || 0;
    form.selling_price = props.product?.selling_price || 0;
    form.quantity = props.product?.quantity || 0;
  }
});


</script>

<template>
    <Dashboard>
        <Head title="Register" />

        <form @submit.prevent="form.post(route('products.store'))" >
            <div class="mt-4">
                <InputLabel
                    for="id"
                    value="ID"
                />

                <NumberInput
                    id="id"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.id"
                    required
                    autocomplete="id"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.id"
                />
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

                <NumberInput
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

                <NumberInput
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

                <NumberInput
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
                    Save
                </PrimaryButton>
            </div>
        </form>
    </Dashboard>
</template>
