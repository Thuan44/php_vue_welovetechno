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

            <div class="container-fluid">
            
                <h1 class="mt-5 text-center" style="font-family: 'Fjalla One', sans-serif;">All our products</h1><p class="text-center" style="color: #777">The best high-tech devices at the lowest possible price</^>
                <div class="divider"></div>

                <div class="row">
                
                </div>

                <div class="row justify-content-center">
                    <div v-for="product in this.$root.products" class="mt-4">
                        <div class="col-4">
                            <div class="card product-card shadow-sm p-3" style="width: 20rem;">
                                <img class="card-img-top" :src="getImgUrl(product.img_name)" alt="Card image cap">
                                <p v-if="product.product_stock <= 10 && product.product_stock > 0" class="card-text stock lead text-center">Almost Sold Out !</p>
                                <p v-if="product.product_stock == 0" class="card-text stock lead text-center" style="color: red">OUT OF STOCK !</p>
                                <div class="card-body d-flex flex-column -justify-content-center">
                                    <h5 class="card-title mb-1" style="font-family: 'Tajawal', sans-serif;">{{ product.product_name }}</h5>
                                    <p class="card-text mb-3">{{ product.brand_name }}</p>
                                    <h4 class="product-price">\${{ product.product_price }}</h4>
                                    <div class="d-flex justify-content-center">
                                        <router-link to="/product-sheet" class="btn btn-dark rounded-lg btn-card text-capitalize mr-2"><i class="far fa-eye"></i></router-link>
                                        <button class="btn btn-warning rounded-lg btn-card text-capitalize"><i class="fas fa-cart-plus"></i></button>
                                    </div>
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
    },
    methods: {
        getImgUrl(picture) {
            return "./assets/" + picture;
        }
    }
}

// Product Sheet
const ProductSheet = {
    template: '<h1>Product Sheet</h1>',
    name: 'ProductSheet'
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
        { path: '/product-sheet', component: ProductSheet, name: 'ProductSheet' },
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
    components: { Home, Contact, Cart, ProductSheet }
}).$mount('#app');