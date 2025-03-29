document.addEventListener("DOMContentLoaded", function () {
    fetchProducts();
});

let productsData = []; // Store fetched products globally
let currentCategory = "All"; // Track selected category

function fetchProducts() {
    axios.get("http://127.0.0.1:8000/api/product")
        .then(response => {
            productsData = response.data;
            renderProducts(productsData);
        })
        .catch(error => {
            console.error("Error fetching products:", error);
        });
}

function renderProducts(products) {
    let productContainer = document.getElementById("product-grid");
    productContainer.innerHTML = ""; // Clear previous content

    products.forEach(product => {
        let productCard = `
            <div class="col-md-4 col-sm-6 mb-4 product-card" data-category="${product.productCategory}">
                <div class="card shadow">
                    <img src="/images/${product.product_detail.imgPath}" class="card-img-top" alt="${product.product_detail.imgPath}">
                    <div class="card-body text-center">
                        <h4 class="card-title">${product.productName}</h4>
                        <p class="fw-bold">RM ${parseFloat(product.product_detail.equipPrice).toFixed(2)}</p>
                        <div class="badge-container">
                        <p class="badge bg-warning text-dark">${product.productCategory}</p>
                        <p class="badge bg-primary text-dark">${product.productBrand}</p>
                    </div>
                    </div>
                </div>
            </div>`;
        productContainer.innerHTML += productCard;
    });
}

// Category Filtering
document.querySelectorAll('.list-group-item a').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelectorAll('.list-group-item a').forEach(el => el.classList.remove('fw-bold'));
        this.classList.add('fw-bold');

        currentCategory = this.getAttribute('data-category'); // Update selected category
        applyFilters();
    });
});

// Sorting Function
document.getElementById("sort").addEventListener("change", function () {
    applyFilters();
});

function filterByBrand(products) {
    if (selectedBrand) {
        return products.filter(product => product.productBrand === selectedBrand);
    }
    return products;
}

function applyFilters() {
    let filteredProducts = [...productsData];

    if (currentCategory !== "All") {
        filteredProducts = filteredProducts.filter(product => product.productCategory === currentCategory);
    }

    const sortBy = document.getElementById("sort").value;
    if (sortBy === "newest") {
        filteredProducts.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
    } else if (sortBy === "high-low") {
        filteredProducts.sort((a, b) => parseFloat(b.product_detail.equipPrice) - parseFloat(a.product_detail.equipPrice));
    } else if (sortBy === "low-high") {
        filteredProducts.sort((a, b) => parseFloat(a.product_detail.equipPrice) - parseFloat(b.product_detail.equipPrice));
    }

    // Apply brand filtering using new function
    filteredProducts = filterByBrand(filteredProducts);

    renderProducts(filteredProducts);
}

