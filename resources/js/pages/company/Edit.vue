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
    name:string
   }
}>();

const form = useForm({
    name: props.data["name"] || ""
});

const submit = () => {
    form.put(route('company.update', props.data.id), {
        onFinish: () => form.reset('name')
    });
};
</script>

<template>
    <AuthBase title="Edit an existing Company" description="">
        <Head title="Edit an existing Company" />

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
                        placeholder="An existing Company"
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
