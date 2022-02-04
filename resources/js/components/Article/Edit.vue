<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Article</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-model="article.title">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Content</label>
                                    <input type="text" class="form-control" v-model="article.content">
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
    name:"update-article",
    data(){
        return {
            article:{
                title:"",
                content:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showArticle()
    },
    methods:{
        async showArticle(){
            await this.axios.get(`/api/article/${this.$route.params.id}`).then(response=>{
                const { title, content } = response.data
                this.article.title = title
                this.article.content = content
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/article/${this.$route.params.id}`,this.article).then(response=>{
                this.$router.push({name:"articleList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>