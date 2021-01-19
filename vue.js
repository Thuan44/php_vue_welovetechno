
// Components ==========
// Homepage
const Home = {
    template: '#home-template',
    name: 'Home'
}

// Contact Page
const Contact = {
    template: '<h1>Contact</h1>',
    name: 'Contact'
}

// Login Page
const Login = {
    template: '<h1>Login</h1>',
    name: 'Login'
}

// Cart Page
const Cart = {
    template: '<h1>Cart</h1>',
    name: 'Cart'
}


// Router ============
const router = new VueRouter({
    routes : [
        {path: '/', component: Home, name: 'Home' },
        {path: '/contact', component: Contact, name: 'Contact' },
        {path: '/login', component: Login, name: 'Login'},
        {path: '/cart', component: Cart, name: 'Cart' }
    ]
})


// Vue Instance ============
const vue = new Vue({
    router,
    components: {Home, Contact, Cart}
}).$mount('#app');