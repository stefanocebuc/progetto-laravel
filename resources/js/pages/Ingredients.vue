<script setup>
import AuthBase from '@/layouts/auth/AuthSimpleLayout.vue';
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
    text-align: center;
    padding: 15px;
}
tr:nth-child(even){
    background-color: #dddddd;
}
</style>

<template>
    <AuthBase title="" description="">
    <head title="Ingredients" />
    <h1>Ingredients Registrati</h1>
    <tbody>
        <tr>
            <th scope="row">id</th>
            <th scope="row">Atc Code</th>
            <th scope="row">Main Ingredient</th>
            <th scope="row">Description</th>
            <th scope="row">Azioni</th>
        </tr>
        <tr v-for="ingredient in data">
            <td>{{ ingredient["id"] }}</td>
            <td>{{ ingredient.atc_code }}</td>
            <td>{{ ingredient.main_ingredient }}</td>
            <td>{{ ingredient.description }}</td>
            <td style="display: inline-flex;">
            <Link v-if="$page.props.auth.user" :href="'/ingredients/' +ingredient.id" as="button">
                    <SvgIcon :fa-icon="faEye"></SvgIcon>
            </Link>
            <Link v-if="$page.props.auth.user" :href="'/ingredients/' +ingredient.id+ '/edit'" as="button">
                    <SvgIcon :fa-icon="faPencil"></SvgIcon>
            </Link>
            <Link onclick="return confirm('Are you sure?')" v-if="$page.props.auth.user" method="DELETE" :href="'/ingredients/' +ingredient.id" as="button">
                <SvgIcon :fa-icon="faTrash"></SvgIcon>
            </Link>
            </td>
        </tr>
    </tbody>
    <Link class="block w-full" :href="route('ingredients.create')" as="button">
        Create New
    </Link>
    </AuthBase>
</template>