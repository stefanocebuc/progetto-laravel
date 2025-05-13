<script setup>
import AuthBase from '@/layouts/FarmaciaHeader.vue';
import { Head } from   '@inertiajs/vue3';
import { Link } from    '@inertiajs/vue3';
import SvgIcon from "vue3-icon";
import { faEye, faTrash, faPencil, faCartShopping } from "@fortawesome/free-solid-svg-icons";
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
    <head title="Drugs" />
    <h1 class="text-center m-7"><b>Farmaci Registrati</b></h1>
    <div class="w-full flex justify-center">
    <tbody>
        <tr>
            <th>id</th>
            <th>Nome</th>
            <th>Minsan Code</th>
            <th>Description</th>
            <th>Expiration Date</th>
            <th>Price</th>
            <th>Azioni</th>
        </tr>
        <tr v-for="drugs in data">
            <td>{{ drugs["id"] }}</td>
            <td>{{ drugs.name }}</td>
            <td>{{ drugs.minsan_code }}</td>
            <td>{{ drugs.description }}</td>
            <td>{{ drugs.expiration_date }}</td>
            <td>{{ drugs.price }}</td>
            <td style="display: inline-flex;">
            <Link v-if="$page.props.auth.user" :href="'/drugs/' +drugs.id" as="button">
                    <SvgIcon :fa-icon="faEye"></SvgIcon>
            </Link>
            <Link v-if="$page.props.auth.user" :href="'/drugs/' +drugs.id+ '/edit'" as="button">
                    <SvgIcon :fa-icon="faPencil"></SvgIcon>
            </Link>
            <Link onclick="return confirm('Are you sure?')" v-if="$page.props.auth.user" method="DELETE" :href="'/drugs/' +drugs.id" as="button">
                <SvgIcon :fa-icon="faTrash"></SvgIcon>
            </Link>
            <Link v-if="$page.props.auth.user" :href="'/drugs/' +drugs.id + '/addtocart'" as="button">
                    <SvgIcon :fa-icon="faCartShopping"></SvgIcon>
            </Link>
            </td>
        </tr>
    </tbody>
</div>
    <Link class="block w-full m-3" :href="route('drugs.create')" as="button">
        Create New Drug
    </Link>
    </AuthBase>
</template>