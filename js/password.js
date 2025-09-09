
$(document).ready(function() {
    $("#passSubmit").on("click", function(e){
        e.preventDefault();

        let inputs = $("input")
        for (let i = 0; i < inputs.length; i++) {
            if (!InvalidMsg(inputs[i])) {
                $("#message").css('color', 'red')
                $("#message").html("Invalid password")
                return
            }
        }

        let data = {
            password_one: $("#password_one").val(),
            password_two: $("#password_two").val(),
            id: $("#id").val()
        }

        if(data.password_one !== data.password_two) {
            $("#message").css('color', 'red')
            $("#message").html("Passwords do not match!")
            return
        }
            let request = {
                url: 'php/password.php',
                method: 'POST',
                data: data,
                success: function(result, status, xhr) {
                    if(xhr.status === 404) {
                        console.log("Error 404: Page not found.")
                    } else {
                        $("#message").css('color', '#4da866')
                        $("#message").html("Password has been saved.")
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error: ", error)
                }
            }
            $.ajax(request)
    })
})
