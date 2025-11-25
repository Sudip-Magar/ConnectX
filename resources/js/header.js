document.addEventListener('alpine:init', () => {
    Alpine.data('header', () => ({
        dropdownOpen: false,
        mobileOpen: false,
        notication: false,
        showToggle() {
            this.dropdownOpen = !this.dropdownOpen;
        },

        dropdownOpenFalse(){
            this.dropdownOpen = false
        },

        showFalse() {
            this.notication = false;
        },

        mobileOpenToggle() {
            this.mobileOpen = !this.mobileOpen
        },

        mobileOpenFalse() {
            this.mobileOpen = false;
        },

        noticationToggle() {
            this.notication = !this.notication
        },

    }))
})