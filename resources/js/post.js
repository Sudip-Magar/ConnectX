document.addEventListener('alpine:init', () => {
    Alpine.data('post', () => ({
        createPost: false,
        previews: [],
        addFiles(event) {
            let files = Array.from(event.target.files);

            files.forEach(file => {
                let reader = new FileReader();

                reader.onload = e => {
                    this.previews.push({
                        file: file,
                        url: e.target.result,
                        type: file.type
                    });
                };

                reader.readAsDataURL(file);
            });

            event.target.value = ""; // allow same file again
        },

        remove(index) {
            this.previews.splice(index, 1);
        },

        showcreatePost() {
            this.createPost = true;
        },

        closeModel() {
            this.createPost = false;
        },

    }))
})