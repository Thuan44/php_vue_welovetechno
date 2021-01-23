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
            
                <h1 class="mt-5 text-center" style="font-family: 'Fjalla One', sans-serif;">All our products</h1><p class="text-center" style="color: #777">The best high-tech devices at the lowest possible price</p>
                <div class="divider"></div>

                <aside class="filter-sidebar">
                    <div class="card">
                        <article class="card-group-item">
                            <header class="card-header">
                                <h6 class="title">Price </h6>
                            </header>
                            <div class="filter-content">
                                <div class="card-body">
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                <label>Min</label>
                                <input type="number" class="form-control" id="inputEmail4" placeholder="$0">
                                </div>
                                <div class="form-group col-md-6 text-right">
                                <label>Max</label>
                                <input type="number" class="form-control" placeholder="$2,0000">
                                </div>
                                </div>
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- card-group-item.// -->
                        <article class="card-group-item">
                            <header class="card-header">
                                <h6 class="title">Brands</h6>
                            </header>
                            <div class="filter-content">
                                <div class="card-body">
                                    <div v-for="product in allBrands">
                                        <div class="custom-control custom-checkbox">
                                            <span class="float-right badge badge-light round">7</span>
                                            <input type="checkbox" class="custom-control-input" :id="product.brand_name" :value="product.brand_name" v-model="selectedBrands">
                                            <label class="custom-control-label" :for="product.brand_name">{{ product.brand_name }}</label>
                                        </div> <!-- form-check.// -->
                                    </div>
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- card-group-item.// -->
                    </div> <!-- card.// -->
                </aside> <!-- col.// -->

                <div v-if="selectedBrands.length > 0">
                    <div class="row justify-content-center cards-container">
                        <div v-for="product in filteredProducts" class="mt-4">
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
                                            <button @click="addToCart(product.product_id)" class="btn btn-warning rounded-lg btn-card text-capitalize"><i class="fas fa-cart-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div class="row justify-content-center cards-container">
                        <div v-for="product in allProducts" class="mt-4">
                            <div class="col-4">
                                <div class="card product-card shadow-sm p-3" style="width: 20rem;">
                                    <img class="card-img-top" :src="getImgUrl(product.img_name)" alt="Card image cap">
                                    <p v-if="product.product_stock <= 10 && product.product_stock > 0" class="card-text stock lead text-center">Almost Sold Out !</p>
                                    <p v-if="product.product_stock == 0" class="card-text stock lead text-center text-danger">OUT OF STOCK !</p>
                                    <div class="card-body d-flex flex-column -justify-content-center">
                                        <h5 class="card-title mb-1" style="font-family: 'Tajawal', sans-serif;">{{ product.product_name }}</h5>
                                        <p class="card-text mb-3">{{ product.brand_name }}</p>
                                        <h4 class="product-price">\${{ product.product_price }}</h4>
                                        <div class="d-flex justify-content-center">
                                            <router-link :to="{name: 'ProductSheet', params: {id: product.product_id}}" class="btn btn-dark rounded-lg btn-card text-capitalize mr-2"><i class="far fa-eye"></i></router-link>
                                            <button @click="addToCart(product.product_id)" class="btn btn-warning rounded-lg btn-card text-capitalize"><i class="fas fa-cart-plus"></i></button>
                                        </div>
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
            selectedBrands: [],
            allProducts: '',
            allBrands: '',
        }
    },
    computed: {
        filteredProducts() {
            let filteredProducts = this.allProducts.filter(product => this.selectedBrands.includes(product.brand_name));
            return filteredProducts;
        },
    },
    methods: {
        getImgUrl(picture) {
            return "./assets/" + picture;
        },
        addToCart(productId) {
            axios
                .post('./admin/action.php', {
                    action: 'addsingleproducttocart',
                    productId: productId
                })
                .then(response => alert(response.data.message))
        },
        // Get all products from database
        fetchAllProducts() {
            axios
                .post('./admin/action.php', {
                    action: 'fetchallproducts'
                }).then(response => (this.allProducts = response.data))
        },
        // Get all products from database
        fetchAllBrands() {
            axios
                .post('./admin/action.php', {
                    action: 'fetchallbrands'
                }).then(response => (this.allBrands = response.data))
        },
    },
    created() {
        // Call fetchAll functions
        this.fetchAllProducts();
        this.fetchAllBrands();
    }
}


// Product Sheet
const ProductSheet = {
    template: '<h1>Product Sheet</h1>',
    name: 'ProductSheet'
}


// Contact Page
const Contact = {
    template: `
    <div>

        <h1>Contact</h1>

        <p>Here is my para</p>
    </div>
    `,
    name: 'Contact'
}


// Cart Page
const Cart = {
    template: `
    <div>

        <div class="container">

            <h1 class="mt-5 text-center" style="font-family: 'Fjalla One', sans-serif;">Cart</h1><p class="text-center" style="color: #777">Summary of your articles</p>
            <div class="divider"></div>

            <table class="table table-hover cart-table shadow-sm">
                <thead>
                    <tr class="text-white text-center font-weight-bold" style="background-color: #1A1A1A !important">
                        <th scope="col"></th>
                        <th scope="col" colspan="2">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col" class="text-right">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-light text-center">
                        <th scope="row"><button type="submit" class="btn btn-danger btn-cart-delete rounded"><i class="fas fa-trash-alt"></i></button></th>
                        <td class="align-middle">Product Image</td>
                        <td class="align-middle">Product Name</td>
                        <td class="align-middle">Column content</td>
                        <td class="align-middle">$5.00</td>
                        <td class="text-right align-middle bg-secondary" style="border-left: 1px dashed rgba(26, 26, 26, .4) !important">$30.00</td>
                    </tr>
                </tbody>
            </table>

            <form action="#">
                <div class="total-group d-flex flex-column">
                    <div class="d-flex align-items-center total-to-pay form-group mb-2 shadow-sm">
                        <label for="total-to-pay" class="mb-0 total-label bg-primary text-white form-control text-uppercase text-center">Total to Pay</label>
                        <input id="total-to-pay" class="text-right total-input form-control bg-light" value="$100.00"></input>
                    </div>
                    <div class="btn-checkout shadow-sm">
                        <button type="submit" class="btn btn-success form-control">Proceed to Checkout <span class="pl-1"><i class="fas fa-credit-card"></i></span></button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    `,
    name: 'Cart'
}


// Router ============
const router = new VueRouter({
    routes: [
        { path: '/', component: Home, name: 'Home' },
        { path: '/product-sheet/:id', component: ProductSheet, name: 'ProductSheet' },
        { path: '/contact', component: Contact, name: 'Contact' },
        { path: '/cart', component: Cart, name: 'Cart' }
    ],
})


// Vue Instance ============
const vue = new Vue({
    data: () => {
        return {
            allCategories: '',
        }
    },
    methods: {
        // Get all categories
        fetchAllCategories() {
            axios
                .post('./admin/action.php', {
                    action: 'fetchallcategories'
                }).then(response => (this.allCategories = response.data))
        },
    },
    created() {
        // Call function fetchAllCategories
        this.fetchAllCategories();
    },
    router,
    components: { Home, Contact, Cart, ProductSheet }
}).$mount('#app');