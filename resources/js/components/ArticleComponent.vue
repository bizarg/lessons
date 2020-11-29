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
            <div class="form-group">
<!--                <tag-component></tag-component>-->
<!--                <vue-taggable-select-->
<!--                        id="tags"-->
<!--                        placeholder="Add some tags"-->
<!--                        v-model="this.tags"-->
<!--                        :taggable="true"-->
<!--                        :options="this.tags"-->
<!--                ></vue-taggable-select>-->
                <v-select v-model="article.tags" :options="this.tags" taggable multiple push-tags />
            </div>
            <button type="submit" class="btn btn-success btn-block">Save</button>
        </form>
        <div class="card card-body mb-2" v-for="article in articles" v-bind:key="article.id">
            <h3>{{ article.attributes.title }}</h3>
            <h6>{{ article.attributes.author }}</h6>
            <p>{{ article.attributes.body }}</p>
            <div class="card card-body mb-2" v-for="tag in article.relationships.tags" v-bind:key="tag.id">
                <p>{{ tag.attributes.name }}</p>
            </div>
            <a class="btn btn-danger" v-on:click="deleteArticle(article.id)">Delete</a>
            <a class="btn btn-warning" v-on:click="editArticle(article.id)">Edit</a>

        </div>
        <paginate
                :page-count="totalPages"
                :click-handler="fetchArticles"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'pagination'"
                :page-class="'page-item'">
        </paginate>
    </div>
</template>

<script>
    // import TagComponent from 'TagComponent'

    export default {
        // components: {
        //     TagComponent
        // },
        mounted() {
        },
        data() {
            return {
                totalPages: 1,
                page: 1,
                edit: false,
                articles: [],
                article: {
                    id: '',
                    title: '',
                    author: '',
                    body: '',
                    createdAt: '',
                    tags: []
                },
                pagination: {},
                tags: []
            };
        },
        created() {
            this.fetchArticles();
            this.fetchTags();
        },
        methods: {
            fetchArticles(page = 1) {
                this.page = page;
                // let page_url = 'api/articles?page[number]=' + page;

                axios.get(page_url)
                    .then((res) => {
                        this.articles = res.data.data;
                        this.makePagination(res.data.meta, res.data.links);
                    });
            },
            fetchTags() {
                axios.get('/tags')
                    .then((res) => {
                        for (var item in res.data.data) {
                            this.tags.push(res.data.data[item].attributes.name);
                        }
                    });
            },
            makePagination(meta, links) {
                this.totalPages = meta.totalPages
            },

            deleteArticle(id) {
                axios.delete('api/articles/' + id)
                    .then((res) => {
                        this.articles.find(function (el, index, array) {
                            if (el.id === id) {
                                array.shift(index)
                            }
                        });
                    }).catch(err => {
                        console.log(err);
                    });
            },

            addArticle() {
                if (this.edit === false) {
                    axios.post('api/articles', {
                        title: {en: this.article.title, ru: this.article.title},
                        body: {en: this.article.body, ru: this.article.title},
                        tags: this.article.tags
                    })
                        .then(res => {
                            this.article.title = '';
                            this.article.body = '';
                            this.article.tags = [];

                            this.articles.push(res.data.data)
                        }).catch(err => {
                        console.log(err);
                    });
                } else {
                    axios.put('api/articles/' + this.edit, {
                        title: {en: this.article.title, ru: this.article.title},
                        body: {en: this.article.body, ru: this.article.title},
                        tags: this.article.tags
                    }).then(res => {


                        let index = this.searchById(id);
                        this.edit = id;
                        let article = this.articles[index];
                        article.title = this.article.title;
                        article.body = this.article.body;
                        article.relationships.tags = res.data.data.relationships.tags;

                        this.article.title = '';
                        this.article.body = '';
                        this.article.tags = [];
                    }).catch(err => {
                        console.log(err);
                    });
                }
            },

            editArticle(id) {
                let index = this.searchById(id);
                this.edit = id;
                let article = this.articles[index];

                this.article.title = article.attributes.title;
                this.article.body = article.attributes.body;

                for (let tag in article.relationships.tags) {
                    this.article.tags.push(article.relationships.tags[tag].attributes.name);
                }

            },

            searchById(id) {
                let result;

                this.articles.find(function (el, index, array) {
                    if (el.id === id) {
                        result = index;
                    }
                    return null;
                });

                return result;
            }
        }
    }
</script>
