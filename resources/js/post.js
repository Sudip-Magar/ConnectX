document.addEventListener('alpine:init', () => {
    Alpine.data('post', () => ({
        createPost: false,
        previews: [],

        remove(index) {
            this.previews.splice(index, 1);
        },

        showcreatePost() {
            this.createPost = true;
        },

        closeModel() {
            this.createPost = false;
            this.createComment = false
        },

    }))
})