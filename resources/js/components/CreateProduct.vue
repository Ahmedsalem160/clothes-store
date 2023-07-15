<template>
    <div class="container">
        <!-- Button trigger modal -->
        <button
            type="button"
            class="btn btn-primary float-right"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
        >
            + Add New Product
        </button>

        <!-- Modal -->
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1
                            v-if="edit"
                            class="modal-title fs-5"
                            id="exampleModalLabel"
                        >
                            Editing Product...
                        </h1>
                        <h1
                            v-else
                            class="modal-title fs-5"
                            id="exampleModalLabel"
                        >
                            Adding New Product...
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="ProductName">Product Name</label>
                                <input
                                    type="text"
                                    :class="[
                                        'form-control',
                                        errors.name ? 'is-invalid' : '',
                                    ]"
                                    id="name"
                                    placeholder="name"
                                    v-model="product.name"
                                />
                                <span
                                    v-if="errors.name"
                                    class="text-danger p-1"
                                    >{{ errors.name[0] }}</span
                                >
                            </div>
                            <div class="form-group">
                                <label for="description"
                                    >Product Description</label
                                >
                                <input
                                    type="text"
                                    :class="[
                                        'form-control',
                                        errors.description ? 'is-invalid' : '',
                                    ]"
                                    id="description"
                                    placeholder="Description"
                                    v-model="product.description"
                                />
                                <span
                                    v-if="errors.description"
                                    class="text-danger p-1"
                                    >{{ errors.description[0] }}</span
                                >
                            </div>
                            <div class="form-group">
                                <label for="category_id"
                                    >Category Clothes</label
                                >
                                <select
                                    v-model="product.category_id"
                                    :class="[
                                        'form-control',
                                        errors.name ? 'is-invalid' : '',
                                    ]"
                                    id="category_id"
                                >
                                    <option value="1">men</option>
                                    <option value="2">women</option>
                                </select>
                                <span
                                    v-if="errors.category_id"
                                    class="text-danger p-1"
                                    >{{ errors.category_id[0] }}</span
                                >
                            </div>

                            <div class="form-group">
                                <label for="Price">Product Price</label>
                                <input
                                    type="text"
                                    :class="[
                                        'form-control',
                                        errors.price ? 'is-invalid' : '',
                                    ]"
                                    id="Price"
                                    placeholder="Price"
                                    v-model="product.price"
                                />
                                <span
                                    v-if="errors.price"
                                    class="text-danger p-1"
                                    >{{ errors.price[0] }}</span
                                >
                            </div>
                            <div class="form-group">
                                <label for="discount">Product Discount</label>
                                <input
                                    type="text"
                                    :class="[
                                        'form-control',
                                        errors.discount ? 'is-invalid' : '',
                                    ]"
                                    id="discount"
                                    placeholder="Discount"
                                    v-model="product.discount"
                                />
                                <span
                                    v-if="errors.discount"
                                    class="text-danger p-1"
                                    >{{ errors.discount[0] }}</span
                                >
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                        <button
                            type="button"
                            class="btn btn-success"
                            v-if="edit"
                            @click="updateProduct"
                        >
                            Update changes
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="makeProduct"
                            v-else
                        >
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- All Products in one Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Discription</th>
                    <th scope="col">price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Category Related</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products.data" :key="product.id">
                    <th scope="row">{{ product.id }}</th>
                    <td>{{ product.name }}</td>
                    <td>{{ product.description }}</td>
                    <td>{{ product.price }}</td>
                    <td>{{ product.discount }}</td>
                    <td>{{ product.category_id }}</td>
                    <td>
                        <!-- Button trigger modal Now for Updating product -->
                        <button
                            type="button"
                            class="btn btn-success"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                            @click="editProduct(product)"
                        >
                            Edit
                        </button>
                        <!-- Button for Deleting product -->
                        <button
                            type="button"
                            class="btn btn-danger"
                            @click="deleteProduct(product)"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- <Bootstrap5Pagination
            :data="products"
            @pagination-change-page="getProducts"
        /> -->
        <!-- <TailwindPagination :data="products" @pagination-change-page="getProducts"/> -->
        <RenderlessPagination
            :data="products"
            :limit="limit"
            :keep-length="keepLength"
            @pagination-change-page="getProducts"
            v-slot="slotProps"
        >
            <nav
                v-bind="$attrs"
                aria-label="..."
                v-if="slotProps.computed.total > slotProps.computed.perPage"
            >
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <button
                            class="page-link"
                            :disabled="!slotProps.computed.prevPageUrl"
                            v-on="slotProps.prevButtonEvents"
                        >
                            <slot name="prev-nav"> Previous </slot>
                        </button>
                    </li>

                    <li
                        class="page-item"
                        :aria-current="
                            slotProps.computed.currentPage ? 'page' : null
                        "
                        v-for="(page, key) in slotProps.computed.pageRange"
                        :key="key"
                        v-on="slotProps.pageButtonEvents(page)"
                    >
                        <button class="page-link">
                            {{ page }}
                        </button>
                    </li>
                    <li class="page-item">
                        <button
                            class="page-link"
                            :disabled="!slotProps.computed.nextPageUrl"
                            v-on="slotProps.nextButtonEvents"
                        >
                            <slot name="next-nav"> Next </slot>
                        </button>
                    </li>
                </ul>
            </nav>
        </RenderlessPagination>
    </div>
</template>

<script>
import RenderlessPagination from "laravel-vue-pagination/src/RenderlessPagination.vue";

export default {
    data() {
        return {
            edit: false, // this var for updating on the form
            products: {}, //Object of objects
            product: {
                name: "",
                image: "image2",
                description: "",
                price: "",
                discount: "",
                category_id: "",
            },
            errors: [],
        };
    },
    inheritAttrs: false,

    emits: ["pagination-change-page"],

    components: {
        RenderlessPagination,
    },

    props: {
        data: {
            type: Object,
            default: () => {},
        },
        limit: {
            type: Number,
            default: 0,
        },
        keepLength: {
            type: Boolean,
            default: false,
        },
    },
    methods: {
        onPaginationChangePage(page) {
            this.$emit("pagination-change-page", page);
        },
        showAlert(msg) {
            // Use sweetalert2
            this.$swal(msg);
        },
        makeProduct() {
            axios.post("product/create", this.product).then((response) => {
                console.log(response.data.status);
                if (response.data.status == false) {
                    this.errors = response.data.errors;
                    console.log(response.data.errors);
                } else {
                    // for add in the view using js
                    this.products.push(response.data.product);
                    // Alert
                    this.showAlert(
                        this.product.name + " Product Created Successfully."
                    );
                    //print the response in consle
                    console.log(response.data.product);
                    // Reset the Data
                    this.product = {
                        name: "",
                        image: "image2",
                        description: "",
                        price: "",
                        discount: "",
                        category_id: "",
                    };
                    this.errors = [];
                }
            });
        },
        getProducts(page = 1) {
            axios.get("/product/all?page=" + page).then((response) => {
                console.log(response.data.products);
                console.log(response.data.status);
                this.products = response.data.products;
                console.log(response.data.products);
            });
        },
        editProduct(product) {
            this.product = product;
            this.edit = true;
        },
        updateProduct() {
            axios
                .post("product/update/" + this.product.id, this.product)
                .then((response) => {
                    console.log(response.data.status);
                    if (response.data.status == false) {
                        this.errors = response.data.errors;
                        console.log(response.data.errors);
                        this.showAlert("Your updates not Right !!");
                    } else {
                        // for add in the view using js
                        // this.products.push(response.data.product);
                        // Alert
                        this.showAlert(
                            this.product.name + " Product Updated Successfully."
                        );
                        //print the response in consle
                        console.log(response.data.product);
                        // Reset the Data
                        this.product = {
                            name: "",
                            image: "image2",
                            description: "",
                            price: "",
                            discount: "",
                            category_id: "",
                        };
                        this.errors = [];
                        this.edit = false;
                    }
                });
        },
        deleteProduct(product) {
            this.product = product;
            console.log(this.product);
            //caution
            this.$swal
                .fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        axios
                            .post(
                                "product/delete/" + this.product.id,
                                this.product
                            )
                            .then((response) => {
                                if (response.data.status == false) {
                                    console.log("some thing error");
                                }
                            });
                        this.getProducts();
                        this.$swal.fire(
                            this.product.name,
                            "Your Product has been deleted.",
                            "success"
                        );
                    }
                });
        },
    },
    mounted: function () {
        // for calling function
        this.getProducts();
    },
    name: "CreateProduct",
};
</script>
