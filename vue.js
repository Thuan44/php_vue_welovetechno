// Components ==========
// Homepage
const Home = {
    template: `
        <div>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol> 
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./assets/img/iphone_xr.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/nasdaq.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/ventes_flash.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="container">

                <div class="row">
                    <div v-for="product in this.$root.products" class="mt-4">
                        <div class="col-4">
                            <div class="card rounded shadow-sm p-3" style="width: 20rem;">
                                <img class="card-img-top rounded" src="./assets/img/iphone.jpg" alt="Card image cap">
                                <div class="card-body d-flex flex-column -justify-content-center">
                                    <h5 class="card-title">{{ product.product_name }}</h5>
                                    <p class="card-text">Description</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        
        </div>
    `,
    name: 'Home',
    data: () => {
        return {
            
        }
    }
}


// Contact Page
const Contact = {
    template: '<h1>Contact</h1>',
    name: 'Contact'
}


// Cart Page
const Cart = {
    template: '<h1>Cart</h1>',
    name: 'Cart'
}


// Router ============
const router = new VueRouter({
    routes: [
        { path: '/', component: Home, name: 'Home' },
        { path: '/contact', component: Contact, name: 'Contact' },
        { path: '/cart', component: Cart, name: 'Cart' }
    ],
})


// Vue Instance ============
const vue = new Vue({
    data: () => {
        return {
            products: [],
            categories: []
        }
    },
    mounted() {
        // Products
        axios
            .get('libraries/controllers/getData.php')
            .then((response) => response.data)
            .then((response) => {
                this.products = response;
            }),
        
        axios
            .get('libraries/controllers/getDataCategories.php')
            .then((response) => response.data)
            .then((response) => {
                this.categories = response;
            })
    },
    router,
    components: { Home, Contact, Cart }
}).$mount('#app');