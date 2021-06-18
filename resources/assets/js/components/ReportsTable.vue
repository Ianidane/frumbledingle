<template>
    <div>
        <form @submit.prevent="getReport">
            <div class="create-Item-form input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Price</span>
                </div>
                <input v-model="reportPrice" type="text" class="form-control" placeholder="Price" value='' required/>
                
                <div class="input-group-append">
                    <button class="btn btn-primary">Run</button>
                </div>
            </div>
        </form>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>Location</th>
                <th>Parent Category</th>
                <th>Category</th>
                <th>Count</th>
            </thead>
            <tbody>
                <!-- <tr v-for="row in Items" :key="row.id">
                    <td>{{ row.location.name }}</td>
                    <td>{{ row.item.category_id }}</td>
                    <td>{{ row.price }}</td>
                    <td>{{ row.location_id }}</td>
                    <td>{{ row.category_id }}</td>
                </tr> -->
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            Items: [],
            reportPrice: 0
        };
    },
    mounted() {
        // this.getItems();
    },
    methods: {
        getReport() {
            return axios.get('/api/report', {
                params: {
                    price: this.reportPrice
                }
            })
                .then(response => {
                    console.log(response.data);
                    // this.Items = response.data;
                }).catch(console.error);
        }
    }
}
</script>

<style>
.create-item-form {
    margin-bottom: 10px;
}
</style>