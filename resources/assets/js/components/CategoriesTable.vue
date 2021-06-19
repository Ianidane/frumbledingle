<template>
    <div>
        <form @submit.prevent="createCategory">
            <div class="create-Category-form input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                <input v-model="newCategoryName" type="text" class="form-control" placeholder="Category Name" required/>

                <div class="input-group-append">
                    <span class="input-group-text">Parent Category</span>
                </div>
                <select v-model="newCategoryParent" class="form-control">
                <option>Select Parent Category</option>
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
                <th>Parent Category</th>
                <th></th>
            </thead>
            <tbody>
                <tr v-for="row in Categories" :key="row.id">
                    <td>{{ row.id }}</td>
                    <td>{{ row.name }}</td>
                    <td>{{ row.parent == null ? '' : row.parent.name }}</td>
                    <td align="center"><button class="btn btn-danger btn-sm" @click.prevent="deleteCategory(row.id)"><i class="fa fa-times" /> Delete</button></td>
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
            Categories: [],
            newCategoryName: '',
            newCategoryParent: '',
        };
    },
    mounted() {
        this.getCategories();
    },
    methods: {
        getCategories() {
            return axios.get('/api/categories')
                .then(response => {
                    console.log(response.data);
                    this.Categories = response.data;
                }).catch(console.error);
        },
        createCategory() {
            return axios.post('/api/categories', {
                name: this.newCategoryName,
                parent: this.newCategoryParent,
                })
                .then(this.getCategories)
                .then(() => this.newCategoryName = '')
                .catch(console.error);
        },
        deleteCategory(id) {
            return axios.post('/api/categories/' + id, {_method: 'DELETE'})
                .then(this.getCategories)
                .catch(console.error);
        }
    }
}
</script>

<style>
.create-category-form {
    margin-bottom: 10px;
}
</style>