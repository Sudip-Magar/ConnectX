document.addEventListener('alpine:init', () => {
    Alpine.data('header', () => ({
        show: false,
        showToggle(){
            this.show = !this.show;
        },

        showFalse(){
            this.show = false;
        },

    }))
})