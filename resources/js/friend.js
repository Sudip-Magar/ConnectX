document.addEventListener('alpine:init', () => {
    Alpine.data('friend', () => ({
        show: true,
        showFollower(){
            this.show = true
        },
        showFollowing(){
            this.show= false
        },
    }))
})