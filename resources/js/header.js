document.addEventListener('alpine:init', () => {
    Alpine.data('header', () => ({
        dropdownOpen: false,
        mobileOpen: false,
        showToggle(){
            this.dropdownOpen = !this.dropdownOpen;
        },

        showFalse(){
            this.dropdownOpen = false;
        },

        mobileOpenToggle(){
            this.mobileOpen = !this.mobileOpen
        },

        mobileOpenFalse(){
            this.mobileOpen = false;
        },

    }))
})