<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const form = useForm({
    atc_code: '',
    main_ingredient: '',
    description: ''
});

const submit = () => {
    form.post(route('ingredients.store'), {
        onFinish: () => form.reset('name')
    });
};
</script>

<template>
    <AuthBase title="Create a new Active Ingredient" description="Enter your details below to create a new Active Ingredient">
        <Head title="Create a new Active Ingredient" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="atc_code">Atc Code</Label>
                    <Input
                        id="atc_code"
                        type="text"
                        required
                        :tabindex="1"
                        v-model="form.atc_code"
                        placeholder="A New Atc Code"
                    />
                    <InputError :message="form.errors.atc_code" />
                    <Label for="main_ingredient">Main Ingredient</Label>
                    <Input
                        id="main_ingredient"
                        type="text"
                        required
                        :tabindex="1"
                        v-model="form.main_ingredient"
                        placeholder="A New Description"
                    />
                    <InputError :message="form.errors.main_ingredient" />
                    <Label for="description">Description</Label>
                    <Input
                        id="description"
                        type="text"
                        required
                        :tabindex="1"
                        v-model="form.description"
                        placeholder="A New Description"
                    />
                    <InputError :message="form.errors.description" />
                </div>
                <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Create a New Active Ingredient
                </Button>
                </div>
        </form>
    </AuthBase>
</template>
