import '../bootstrap'

class GetProduct {
    getProducts() {
        let getProducts = this
        let cart        = localStorage.getItem('cart')
        let url         = "/product-cart"

        $.ajax({
            type: "GET",
            url : url,
            data: JSON.parse(cart)
        }).then(function (res) {
            if ($.isEmptyObject(res)) {
                localStorage.removeItem('cart')
                getProducts.getProducts()
            }

            $('.table-body').append(res)
        })
    }
}

export default new GetProduct()
