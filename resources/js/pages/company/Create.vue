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
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('company.store'), {
        onFinish: () => form.reset('name')
    });
};
</script>

<template>
    <AuthBase title="Create a new Company" description="Enter your details below to create a new Company">
        <Head title="Create a new Company" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="name">Company Name</Label>
                    <Input
                        id="name"
                        type="name"
                        required
                        :tabindex="1"
                        v-model="form.name"
                        placeholder="A New Company"
                    />
                    <InputError :message="form.errors.name" />
                </div>
                <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Create 
                </Button>
                </div>
        </form>
    </AuthBase>
</template>
