<script setup>
import AuthBase from '@/layouts/auth/AuthSimpleLayout.vue';
import { Head } from   '@inertiajs/vue3';
defineProps({ data: Object })
</script>
<style>
table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
td, th{
    border: 1px solid #dddddd;
    text-align: center;
    padding: 15px;
}
tr:nth-child(even){
    background-color: #dddddd;
}
</style>
<template>
    <AuthBase title="" description="">
    <head title="Ingredient" />
    <h1>Dettaglio Farmaco</h1>
    <br/>
    <tbody>
    <tr>
        <th scope="row">id</th>
        <th scope="row">Atc Code</th>
        <th scope="row">Main Ingredient</th>
        <th scope="row">Description</th>
    </tr>
    <tr>
        <td>{{ data.id }}</td>
        <td>{{ data.atc_code }}</td>
        <td>{{ data.main_ingredient }}</td>
        <td>{{ data.description }}</td>
    </tr>
    </tbody>
    <tbody>
        <tr>
            <th>id</th>
            <th>Nome</th>
            <th>Minsan Code</th>
            <th>Description</th>
            <th>Expiration Date</th>
            <th>Price</th>
        </tr>
        <tr v-for="drugs in data.drugs ">
            <td>{{ drugs["id"] }}</td>
            <td>{{ drugs.name }}</td>
            <td>{{ drugs.minsan_code }}</td>
            <td>{{ drugs.description }}</td>
            <td>{{ drugs.expiration_date }}</td>
            <td>{{ drugs.price }}</td>
        </tr>
    </tbody>
    <br/>
    </AuthBase>
</template>