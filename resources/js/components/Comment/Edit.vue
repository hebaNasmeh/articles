<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Comment</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Content</label>
                                    <input type="text" class="form-control" v-model="comment.content">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
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
    name:"update-comment",
    data(){
        return {
            comment:{
                content:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showComment()
    },
    methods:{
        async showComment(){
            await this.axios.get(`/api/comment/${this.$route.params.id}`).then(response=>{
                console.log(`/api/comment/${this.$route.params.id}`)
                console.log(response.data)
                const { article_id, content } = response.data
                this.comment.content = content
                this.article_id = article_id
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/comment/${this.$route.params.id}`,this.comment).then(response=>{
                //this.$router.push({name:"commentList",params:{id:this.article_id}})
                location.replace(`/Allcomment/${this.article_id}`)
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>