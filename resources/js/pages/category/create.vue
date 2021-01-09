<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-item-center">
                        <h5 class="mb-0">Create Category</h5>
                        <router-link :to="{name: 'category-list'}" class="btn btn-sm btn-primary">Category List</router-link>
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="createCategory">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input v-model="categoryForm.name" type="text" name="name" class="form-control" :class="{ 'is-invalid': categoryForm.errors.has('name') }">
                                <has-error :form="categoryForm" field="name"></has-error>
                            </div>

                            <button type="submit" class="btn btn-success">Submit</button>
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
            createCategory() {
                this.categoryForm.post('/api/categories')
                .then(({ data }) => {
                    this.categoryForm.name = ''
                    this.$toast.success({
                        title:'success',
                        message:'Category created successfully'
                    })
                })
            }
        }
    }
</script>

<style>

</style>
