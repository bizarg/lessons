<template>
    <div>

        <div class="card card-body mb-2" v-for="notification in notifications" v-bind:key="notification.id">
            <h3>{{ notification.attributes.data.message }}</h3>
            <h6>{{ notification.attributes.readAt }}</h6>
        </div>

<!--        <ul>-->
<!--            <li v-for="post in notifications.data" :key="post.id">{{ post.title }}</li>-->
<!--        </ul>-->

<!--        <pagination :data="notifications" @pagination-change-page="fetchNotifications"></pagination>-->


        <paginate
                :page-count="totalPages"
                :click-handler="fetchNotifications"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'pagination'"
                :page-class="'page-item'">
        </paginate>
    </div>
</template>



<script>
    // Vue.component('pagination', require('laravel-vue-pagination'));

    export default {
        mounted() {
        },
        data() {
            return {
                totalPages: 1,
                page: 1,
                edit: false,
                notifications: [],
                notification: {
                    id: '',
                    type: '',
                    data: '',
                    readAt: '',
                    createdAt: ''
                },
                pagination: {}
            };
        },
        created() {
            this.fetchNotifications();
        },
        //
        methods: {
            fetchNotifications(page = 1) {
                this.page = page;
                let page_url = '/notifications?page[number]=' + page;

                axios.get(page_url)
                    .then((res) => {
                        this.notifications = res.data.data;

                        this.makePagination(res.data.meta, res.data.links);

                });
            },

            makePagination(meta, links) {
                this.totalPages = meta.totalPages
            },
            // deleteArticle(id) {
            //     if (confirm('Are you sure')) {
            //         axios.delete('articles/' + id);
            //     }
            // },
            //
            // addArticle() {
            //     if (this.edit === false) {
            //         axios.post('articles', {body: this.article})
            //             .then(res => {
            //                 console.log(res);
            //                 this.article.title = '';
            //                 this.article.body = '';
            //             }).catch(err => {
            //             console.log(err);
            //         });
            //     }
            // }

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
