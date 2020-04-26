<template>
    <div>
        <h2>Articles</h2>
        <form @submit.prevent="addArticle">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Title" v-model="article.title">
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Body" v-model="article.body"></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-block">Save</button>
        </form>
        <div class="card card-body mb-2" v-for="article in articles" v-bind:key="article.id">
            <h3>{{ article.attributes.title }}</h3>
            <h6>{{ article.attributes.author }}</h6>
            <p>{{ article.attributes.body }}</p>

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
        },
        data() {
            return {
                edit: false,
                articles: [],
                article: {
                    id: '',
                    title: '',
                    author: '',
                    body: '',
                    createdAt: ''
                },
                pagination: {}
            };
        },
        //
        created() {
            this.fetchArticles();
        },
        //
        methods: {
            fetchArticles(page_url) {
                let vm = this;
                page_url = page_url || 'articles';

                axios.get(page_url)
                    .then((res) => {
                        this.articles = res.data;
                        // vm.makePagination(res.meta, res.links);
                });

            },

            makePagination(meta, links) {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },
            deleteArticle(id) {
                if (confirm('Are you sure')) {
                    axios.delete('articles/' + id);
                }
            },

            addArticle() {
                if (this.edit === false) {
                    axios.post('articles', {body: this.article})
                        .then(res => {
                            console.log(res);
                            this.article.title = '';
                            this.article.body = '';
                        }).catch(err => {
                        console.log(err);
                    });
                }
            }

            // createTask() {
            //     axios.post('api/tasks', this.task)
            //         .then((res) => {
            //             this.task.body = '';
            //             this.edit = false;
            //             this.fetchTaskList();
            //         })
            //         .catch((err) => console.error(err));
            // },
            //
            // deleteTask(id) {
            //     axios.delete('api/tasks/' + id)
            //         .then((res) => {
            //             this.fetchTaskList()
            //         })
            //         .catch((err) => console.error(err));
            // },
        }
    }
</script>
