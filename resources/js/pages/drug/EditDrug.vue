<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const props= defineProps<{
   data: {
    id:string,
    name:string,
    minsan_code:string,
    description:string,
    expiration_date:string,
    price:string
   }
}>();

const form = useForm({
    name: props.data["name"] || "",
    minsan_code: props.data["minsan_code"] || "",
    description: props.data["description"] || "",
    expiration_date: props.data["expiration_date"] || "",
    price: props.data["price"] || 0
});

const submit = () => {
    form.put(route('drugs.update', props.data.id), {
        onFinish: () => form.reset('name')
    });
};
</script>

<template>
    <AuthBase title="Edit an existing Drug" description="">
        <Head title="Edit an existing Drug" />
       
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
                        placeholder="An existing Drug"
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
                </div>
                <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Create 
                </Button>
                </div>
        </form>
    </AuthBase>
</template>
