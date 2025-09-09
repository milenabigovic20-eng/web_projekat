document.querySelector('.dropdown').style.display = 'none'
let icon = document.getElementById('profile-icon')
let dropdown = $(".dropdown");

icon.addEventListener("click", () => {
    if(document.querySelector('.dropdown').style.display === 'none') {
        document.querySelector('.dropdown').style.display = 'block'
    } else if(document.querySelector('.dropdown').style.display === 'block') {
        document.querySelector('.dropdown').style.display = 'none'
    }
})