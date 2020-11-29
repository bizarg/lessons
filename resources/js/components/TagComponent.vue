<template>
    <div>
        <vue-taggable-select
                id="tags"
                placeholder="Add some tags"
                v-model="article.tags"
                :taggable="true"
                :options="this.tags"
        ></vue-taggable-select>
    </div>
</template>

<script>
    export default {
        mounted() {
        },
        data() {
            return {
                tags: []
            };
        },
        created() {
            this.fetchTags();
        },
        methods: {
            fetchTags() {
                axios.get('/tags')
                    .then((res) => {
                        for (var item in res.data.data) {
                            this.tags.push(res.data.data[item].attributes.name);
                        }
                    });
            },
        }
    }
</script>
