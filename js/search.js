$(document).ready(function() {
    $("#search_bar").on("input", function(e){
        e.preventDefault()

        let query = $("#search_bar").val()

        if (query.trim() !== "") {
            let request = {
                url: 'php/search.php',
                type: 'GET',
                data: {query: query},
                success: function(result, status, xhr) {
                    if (xhr.status === 404) {
                        console.log("Error 404: Page not found.")
                    } else {
                        $("#search_result").html(result)
                    }
                },
                error: function(xhr, status, error) {
                    $("#search_result").html(error)
                }
            }
            $.ajax(request)
        } else {
            $("#search_result").html("")
        }
    })
})
