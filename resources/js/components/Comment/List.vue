<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"commentAdd",params:{id:this.$route.params.id}}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Comment</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Content</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="comments.length > 0">
                                <tr v-for="(comment,key) in comments" :key="key">
                                    <td>{{ comment.id }}</td>
                                    <td>{{ comment.user.name }}</td>
                                    <td>{{ comment.content }}</td>
                                    <td>
                                        <router-link :to='{name:"commentEdit",params:{id:comment.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteComment(comment.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No Comments Found.</td>
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
    name:"comments",
    data(){
        return {
            comments:[]
        }
    },
    mounted(){
        this.getComments()
    },
    methods:{
        async getComments(){
            await axios.get(`http://127.0.0.1:8000/api/Allcomment/${this.$route.params.id}`).then(response=>{
                console.log(response.data)
                this.comments = response.data
            }).catch(error=>{
                console.log(error)
                this.comments = []
            })
        },
        deleteComment(id){
            if(confirm("Are you sure to delete this comment ?")){
                this.axios.delete(`/api/comment/${id}`).then(response=>{
                    this.getComments()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>