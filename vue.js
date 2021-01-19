
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
                        <img src="./assets/img/iphone_xr.png" class="d-block w-100" alt="...">
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

            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="make-3D-space">
                        <div class="product-card rounded">
                            <div class="product-front">
                                <div class="shadow"></div>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt.png" alt="" />
                                <div class="image_overlay"></div>
                                <div class="view_details">View details</div>
                                <div class="stats">
                                    <div class="stats-container">
                                        <span class="product_price">$39</span>
                                        <span class="product_name">Adidas Originals</span>
                                        <p>Men's running shirt</p>

                                        <div class="product-options">
                                            <strong>SIZES</strong>
                                            <span>XS, S, M, L, XL, XXL</span>
                                            <strong>COLORS</strong>
                                            <div class="colors">
                                                <div class="c-blue"><span></span></div>
                                                <div class="c-red"><span></span></div>
                                                <div class="c-white"><span></span></div>
                                                <div class="c-green"><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3>{{ msg }}</h3>
            <div v-for="product in products">
                <ul>
                    <li>{{ product.product_name }}</li>
                </ul>
            </div>

            <div v-for="product in products">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="./assets/img/iphone.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ product.product_name }}</h5>
                        <p class="card-text">Description</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        </div>
    `,
    name: 'Home',
    data: () => {
        return {
            products: [],
            msg: 'Hello'
        }
    },
    created() {
        axios
            .get('libraries/controllers/getData.php')
            .then((response) => response.data)
            .then((response) => {
                this.products = response;
            })
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
    ]
})


// Vue Instance ============
const vue = new Vue({
    data: () => {
        return {
            products: [],
        }
    },
    mounted() {
        axios
            .get('libraries/controllers/getData.php')
            .then((response) => response.data)
            .then((response) => {
                this.products = response;
            })
    },
    router,
    components: { Home, Contact, Cart }
}).$mount('#app');