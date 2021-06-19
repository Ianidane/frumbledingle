<template>
    <div>
        <form @submit.prevent="createItem">
            <div class="create-Item-form input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                <input v-model="newItemName" type="text" class="form-control" placeholder="Item Name" required/>

                <div class="input-group-prepend">
                    <span class="input-group-text">Price</span>
                </div>
                <input v-model="newItemPrice" type="text" class="form-control" placeholder="Item Price" required/>

                <div class="input-group-append">
                    <span class="input-group-text">Location</span>
                </div>
                <select required v-model="newItemLocation" class="form-control">
                <option>Select Location</option>
                <option v-for="Location in Locations" :key="Location.id" :value="Location.id"> {{ Location.name }}</option>
                </select>

                <div class="input-group-append">
                    <span class="input-group-text">Category</span>
                </div>
                <!-- <input v-model="newItemCategory" type="text" class="form-control" placeholder="Item Category" required/> -->
                <select required v-model="newItemCategory" class="form-control">
                <option>Select Category</option>
                <option v-for="Category in Categories" :key="Category.id" :value="Category.id"> {{ Category.name }}</option>
                </select>
                
                <div class="input-group-append">
                    <button class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Location</th>
                <th>Category</th>
                <th></th>
            </thead>
            <tbody>
                <tr v-for="row in Items" :key="row.id">
                    <td>{{ row.id }}</td>
                    <td>{{ row.name }}</td>
                    <td>{{ row.price }}</td>
                    <td>{{ row.location.name }}</td>
                    <td>{{ row.category.name }}</td>
                    <td align="center"><button class="btn btn-danger btn-sm" @click.prevent="deleteItem(row.id)"><i class="fa fa-times" /> Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            errors: [],
            Items: [],
            Categories: [],
            Locations: [],
            newItemName: '',
            newItemPrice: '',
            newItemLocation: ''
        };
    },
    mounted() {
        this.getItems();
        this.getCategories();
        this.getLocations();
    },
    methods: {
        getItems() {
            return axios.get('/api/items')
                .then(response => {
                    console.log(response.data)
                    this.Items = response.data;
                }).catch(console.error);
        },
        getCategories() {
            return axios.get('/api/categories')
                .then(response => {
                    this.Categories = response.data;
                }).catch(console.error);
        },
        getLocations() {
            return axios.get('/api/locations')
                .then(response => {
                    this.Locations = response.data;
                }).catch(console.error);
        },
        createItem() {
            return axios.post('/api/items', {
                name: this.newItemName,
                price: this.newItemPrice,
                location_id: this.newItemLocation,
                category_id: this.newItemCategory
                })
                .then(this.getItems)
                .then(() => this.newItemName = '')
                .then(() => this.newItemPrice = '')
                .then(() => this.newItemLocation = '')
                .then(() => this.newItemCategory = '')
                .catch(console.error);
        },
        deleteItem(id) {
            return axios.post('/api/items/' + id, {_method: 'DELETE'})
                .then(this.getItems)
                .catch(console.error);
        }
    }
}
</script>

<style>
.create-item-form {
    margin-bottom: 10px;
}
</style>