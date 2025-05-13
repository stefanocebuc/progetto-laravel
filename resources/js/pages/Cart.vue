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
    <head title="Companies"/>
    <h1 class="text-center m-7"><b>Carrello</b></h1>
    <h1 class="text-center m-7"><b>Vuoi procedere con il pagamento?</b></h1>
<div class="w-full flex justify-center">
    <tbody>
        <tr>
            <th>id</th>
            <th>Farmaco</th>
            <th>Azioni</th>
        </tr>
        <tr v-for="cart_row in data">
            <td>{{ cart_row["id"] }}</td>
            <td>{{ cart_row.drug.name }}</td>
            <td style="display: inline-flex;">
            <Link onclick="return confirm('Are you sure?')" v-if="$page.props.auth.user" method="DELETE" :href="'/cart/' +cart_row.id" as="button">
                <SvgIcon :fa-icon="faTrash"></SvgIcon>
            </Link>
            </td>
        </tr>
    </tbody>
</div>
    </AuthBase>
</template>