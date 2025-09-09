
$(document).ready(function() {
    $("#save").on("click", function(e){
        e.preventDefault();

        let inputs = $("input")
        for (let i = 0; i < inputs.length; i++) {
            if (!InvalidMsg(inputs[i])) {
                $("#message").css('color', 'red')
                $("#message").html("Changes could not be saved. Please check the form again!")
                return
            }
        }

        let data = {
            first_name: $("#edit__fName").val(),
            last_name: $("#edit__lName").val(),
            email: $("#edit__email").val(),
            username: $("#edit__username").val(),
            id: $("#user__id").val()
        }

        let request = {
            url: 'php/user.php',
            method: 'POST',
            data: data,
            success: function(result, status, xhr) {
                if(xhr.status === 404) {
                    console.log("Error 404: Page not found.")
                } else {
                    $("#message").css('color', '#4da866')
                    $("#message").html("Changes have been saved.")
                }
            },
            error: function(xhr, status, error) {
                console.log("Error: ", error);
            }
        }
        $.ajax(request)
    })
})