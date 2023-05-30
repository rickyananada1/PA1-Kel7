$(document).ready(function () {
    $(".addToCartBtn").click(function (e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();
        var product_qty = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                product_qty: product_qty,
            },
            success: function (response) {
                swal(response.status);
            },
        });
    });

    $(".increment-btn").click(function (e) {
        e.preventDefault();

        var inc_value = $(this)
            .closest(".input-group")
            .find(".qty-input")
            .val();
        var value = parseInt(inc_value);
        value = isNaN(value) ? 0 : value;
        value++;
        $(this).closest(".input-group").find(".qty-input").val(value);
    });

    $(".decrement-btn").click(function (e) {
        e.preventDefault();

        var dec_value = $(this)
            .closest(".input-group")
            .find(".qty-input")
            .val();
        var value = parseInt(dec_value);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest(".input-group").find(".qty-input").val(value);
        }
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(".delete-cart-item").click(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest(".product_data").find(".prod_id").val();

        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                swal("", response.status, "success");
                setTimeout(function () {
                    window.location.reload();
                }, 3000);
            },
        });
    });

    $(".changeQuantity").click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        var qty = $(this).closest(".product_data").find(".qty-input").val();
        data = {
            prod_id: prod_id,
            prod_qty: qty,
        };
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload();
            },
        });
    });
});

$(".decrement-btn").on("click", function (e) {
    e.preventDefault();
    var prod_id = $(this).closest(".col-md-3").find(".prod_id").val();
    var prod_qty = Number($(this).siblings(".qty-input").val());
    prod_qty--;
    data = {
        prod_id: prod_id,
        prod_qty: prod_qty,
    };
    $.ajax({
        method: "POST",
        url: "update-cart",
        data: data,
        success: function (response) {
            $(this).siblings(".qty-input").val(response.qty);
        },
    });
});

$(".increment-btn").on("click", function (e) {
    e.preventDefault();
    var prod_id = $(this).closest(".col-md-3").find(".prod_id").val();
    var prod_qty = Number($(this).siblings(".qty-input").val());
    prod_qty++;
    data = {
        prod_id: prod_id,
        prod_qty: prod_qty,
    };
    $.ajax({
        method: "POST",
        url: "update-cart",
        data: data,
        success: function (response) {
            $(this).siblings(".qty-input").val(response.qty);
        },
    });
});
