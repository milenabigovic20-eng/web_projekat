$(document).ready(function() {

        let current_restaurant = $("#current_restaurant").val()

        let request = {
            url: 'php/showRestMenu.php',
            type: 'GET',
            data: {current_restaurant: current_restaurant},
            success: function(result, status, xhr) {
                if (xhr.status === 404) {
                    console.log("Error 404: Page not found.")
                } else {
                    $(".main_container").html(result)
                }
            },
            error: function(xhr, status, error) {
                $(".main_container").html(error)
            }
        }
        $.ajax(request)
})