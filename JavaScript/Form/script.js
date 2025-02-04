document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("userForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevents page reload

        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;

        if (name === "" || email === "") {
            document.getElementById("result").innerText = "⚠ Please fill in both fields!";
            return;
        }

        document.getElementById("result").innerText = 
            `✅ Thank you, ${name}! Your email (${email}) has been recorded.`;
    });
});
