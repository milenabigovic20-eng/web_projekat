$(document).ready(function() {
    $(document).on("click", "#remove", function(e) {
        e.preventDefault()

        let data = {
            user_id: $("#user-id").val(),
            food_user_id: $("#food-user-id").val()
        }

        let request = {
            url: 'php/remove.php',
            type: 'POST',
            data: data,
            success: function(result, status, xhr) {
                if(result.status === 'success') {
                    $(".main_container").remove()
                    $(".landing").html(result.table)
                }
            },
            error: function(xhr, status, error) {
                console.log("Error: ", error);
            }
        }
        $.ajax(request)
    })
})