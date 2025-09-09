
let changes = []
$(document).ready(function() {
    $(".select-box").change(function(e) {
        e.preventDefault()

        let input = e.target

        if(!changes.includes(input)) {
            changes.push(input)
        }

        $("#privilegeSelected").on("click", function(e) {
            e.preventDefault()

            for(let i = 0; i < changes.length; i++) {
                let input = changes[i]

                let data = {
                    userId: parseInt(input.getAttribute('id')),
                    userType: parseInt(input.value)
                }

                let request = {
                    url: 'php/changePrivilege.php',
                    method: 'POST',
                    data: data,
                    success: function(result, status, xhr) {
                        if(xhr.status === 404) {
                            console.log("Error 404: Page not found.")
                        } else {
                            $("#message").css('color', 'green')
                            $("#message").html("Changes have been saved.")
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: ", error);
                    }
                }
                $.ajax(request)
            }
            changes = []
        })
    })
})