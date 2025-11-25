document.addEventListener('alpine:init', () => {
    Alpine.data('header', () => ({
        dropdownOpen: false,
        mobileOpen: false,
        notication: false,
        showToggle() {
            this.dropdownOpen = !this.dropdownOpen;
            this.notication = false
        },

        showFalse() {
            this.dropdownOpen = false;
            this.mobileOpen = false;
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