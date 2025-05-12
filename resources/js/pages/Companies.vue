<script setup>
import AuthBase from '@/layouts/FarmaciaHeader.vue';
import { Head } from   '@inertiajs/vue3';
import { Link } from    '@inertiajs/vue3';
import SvgIcon from "vue3-icon";
import { faEye, faTrash, faPencil } from "@fortawesome/free-solid-svg-icons";
defineProps({ data: Object })
</script>
<style>
table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
td, th{
    text-align: left;
    padding: 8px;
}
tr:nth-child(even){
    background-color: #dddddd;
}
</style>
<template>
    <AuthBase title="" description="">
    <head title="Companies" />
    <h1 class="text-center m-7"><b>Aziende Registrate</b></h1>

    <div class="w-full flex justify-center">
    <tbody>
        <tr>
            <th scope="row">id</th>
            <th scope="row">nome</th>
            <th scope="row">azioni</th>
        </tr>
        <tr v-for="company in data">
            <td>{{ company["id"] }}</td>
            <td>{{ company.name }}</td>
            <td style="display: inline-flex;">
            <Link v-if="$page.props.auth.user" :href="'/company/' +company.id" as="button">
                    <SvgIcon :fa-icon="faEye"></SvgIcon>
            </Link>
            <Link v-if="$page.props.auth.user" :href="'/company/' +company.id+ '/edit'" as="button">
                    <SvgIcon :fa-icon="faPencil"></SvgIcon>
            </Link>
            <Link onclick="return confirm('Are you sure?')" v-if="$page.props.auth.user" method="DELETE" :href="'/company/' +company.id" as="button">
                <SvgIcon :fa-icon="faTrash"></SvgIcon>
            </Link>
            </td>
        </tr>
    </tbody>
</div>
    <Link class="block w-full m-3" :href="route('company.create')" as="button">
        Create New
    </Link>

    </AuthBase>
</template>