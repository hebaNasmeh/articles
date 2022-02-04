<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Comment</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Content</label>
                                    <input type="text" class="form-control" v-model="comment.content">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"add-comment",
    data(){
        return {
            comment:{
                title:"",
                content:""
            }
        }
    },
    methods:{
        async create(){
            await axios.post(`/api/comment/${this.$route.params.id}`,this.comment).then(response=>{
                this.$router.push({name:"commentList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>