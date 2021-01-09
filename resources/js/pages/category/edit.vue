<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-item-center">
                        <h5 class="mb-0">Edit Category {{categoryForm.name}}</h5>
                        <router-link :to="{name: 'category-list'}" class="btn btn-sm btn-primary">Category List</router-link>
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="updateCategory">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input v-model="categoryForm.name" type="text" name="name" class="form-control" :class="{ 'is-invalid': categoryForm.errors.has('name') }">
                                <has-error :form="categoryForm" field="name"></has-error>
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Form } from 'vform'
    export default {

        data() {
            return {
                categoryForm: new Form({
                    name: ''
                })
            }
        },
        methods: {
            updateCategory() {
                let id = this.$route.params.id;

                this.categoryForm.put(`/api/categories/${id}`)
                .then(({ data }) => {

                    this.$toast.success({
                        title:'success',
                        message:'Category update successfully'
                    })
                })
            },

            loadCategory() {
                let id = this.$route.params.id;

                axios.get(`/api/categories/${id}`).then(res => {
                    this.categoryForm.name = res.data.name
                })
            }
        },
        mounted() {
            this.loadCategory()
        }
    }
</script>

<style>

</style>
