<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-item-center">
                        <h5 class="mb-0">Product Category</h5>
                        <router-link :to="{name: 'create-category'}" class="btn btn-sm btn-primary">Add New</router-link>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="category in categoryAll" :key="category.id">
                                    <td>{{category.id}}</td>
                                    <td>{{category.name}}</td>
                                    <td>{{category.slug}}</td>
                                    <td>
                                        <router-link :to="{name: 'edit-category', params: {id: category.id}}">Edit</router-link> |
                                        <a @click.prevent="deleteCategory(category.id)" href="">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            categoryAll : [],
        }
    },
    methods: {
        loadCategories() {
            axios.get('/api/categories').then(res => {
                this.categoryAll = res.data
            })
        },
        deleteCategory(id) {
            axios.delete(`/api/categories/${id}`).then(() => {

                this.$toast.warn({
                    title:'Delete',
                    message:'Category Delete successfully'
                })

                this.loadCategories();
            })
        }
    },
    mounted() {
        this.loadCategories()
    }
}
</script>

<style>

</style>
