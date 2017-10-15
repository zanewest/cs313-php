
function sortByProducts() {
    $.ajax({
        type: "GET",
        url: "products.php",
        success: function () {

            // here is the code that will run on client side after running clear.php on server

            // function below reloads current page
            location.reload();
        },
    });
}

function sortByClothing() {
    $.ajax({
        type: "GET",
        url: "clothing.php",
        success: function () {

            // here is the code that will run on client side after running clear.php on server

            // function below reloads current page
            location.reload();
        },
    });
}



