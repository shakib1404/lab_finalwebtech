document.getElementById('contact-form').addEventListener('submit', function(event) {
    
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('message').value;

    if (name === "" || email === "" || subject === "" || message === "") {
        event.preventDefault(); 
        alert("All fields are required! Please fill in all the fields.");
    }
});
