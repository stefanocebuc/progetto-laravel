<script setup>
import AuthBase from '@/layouts/auth/AuthSimpleLayout.vue';
import { Head } from   '@inertiajs/vue3';
import { Link } from    '@inertiajs/vue3';
import SvgIcon from "vue3-icon";
import { faEye, faTrash, faPencil } from "@fortawesome/free-solid-svg-icons";
defineProps({ data: Object })
</script>

<template>
    <AuthBase title="" description="">
    <head title="Companies" />
    <h1>Aziende Registrate</h1>

    <tbody>
        <tr>
            <th scope="row">id</th>
            <th scope="row">nome</th>
            <th scope="row">azioni</th>
        </tr>
        <tr v-for="company in data">
            <td>{{ company["id"] }}</td>
            <td>{{ company.name }}</td>
            <td style="display: inline;">
                <Link v-if="$page.props.auth.user" :href="'/company/' +company.id" as="button">
                    <SvgIcon :fa-icon="faEye"></SvgIcon>
                </Link>
            <Link onclick="return confirm('Are you sure?')" v-if="$page.props.auth.user" method="DELETE" :href="'/company/' +company.id" as="button">
                <SvgIcon :fa-icon="faTrash"></SvgIcon>
            </Link>
            </td>
        </tr>
    </tbody>
    <Link class="block w-full" :href="route('company.create')" as="button">
        Create New
    </Link>
    </AuthBase>
</template>