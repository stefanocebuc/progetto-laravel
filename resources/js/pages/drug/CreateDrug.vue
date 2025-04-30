<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const props = defineProps<{
    companies: Array<Object>,
    active_ingredient: Array<Object>
}>();

const form = useForm({
    name: '',
    minsan_code: '',
    description: '',
    expiration_date: '',
    price: '',
    company_id: '',
    active_ingredient_id: ''
});

const submit = () => {
    form.post(route('drugs.store'), {
        onFinish: () => form.reset('name')
    });
};
</script>

<template>
    <AuthBase title="Create a new Drug" description="Enter your details below to create a new Drug">
        <Head title="Create a new Drug" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="name">Drug Name</Label>
                    <Input
                        id="name"
                        type="name"
                        required
                        :tabindex="1"
                        v-model="form.name"
                        placeholder="A New Drug"
                    />
                    <InputError :message="form.errors.name" />
                    <Label for="name">Minsan Code</Label>
                    <Input
                        id="minsan_code"
                        type="number"
                        required
                        :tabindex="1"
                        v-model="form.minsan_code"
                        placeholder="An existing Minsan Code"
                    />
                    <InputError :message="form.errors.minsan_code" />
                    <Label for="name">Description</Label>
                    <Input
                        id="description"
                        type="text"
                        required
                        :tabindex="1"
                        v-model="form.description"
                        placeholder="An existing Description"
                    />
                    <InputError :message="form.errors.description" />
                    <Label for="name">Expiration Date</Label>
                    <Input
                        id="expiration_date"
                        type="date"
                        required
                        :tabindex="1"
                        v-model="form.expiration_date"
                        placeholder="An existing Date"
                    />
                    <InputError :message="form.errors.expiration_date" />
                    <Label for="name">Price</Label>
                    <Input
                        id="price"
                        type="number"
                        required
                        :tabindex="1"
                        v-model="form.price"
                        placeholder="An existing Price"
                    />
                    <InputError :message="form.errors.price" />
                    <Label for="name">Company Name</Label>
                    <select id="companies" v-model="form.company_id">
                        <option v-for="item in props.companies" :value="item['id']">{{ item['name'] }}</option>
                        <InputError :message="form.errors.name" />
                    </select>
                    <Label for="name">Active Ingredient</Label>
                    <select id="active_ingredient_id" v-model="form.active_ingredient_id">
                        <option v-for="item in props.active_ingredient" :value="item['id']">{{ item['main_ingredient'] }}</option>
                        <InputError :message="form.errors.active_ingredient_id" />
                    </select>
                </div>
                <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Create 
                </Button>
                </div>
        </form>
    </AuthBase>
</template>
