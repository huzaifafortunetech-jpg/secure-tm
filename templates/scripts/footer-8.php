<script>
document.getElementById("popupForm").addEventListener("submit", function(e){
    e.preventDefault();

    let formData = new FormData(this);

    fetch("web-popup-form.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        // We trim to remove any accidental whitespace/newlines
        if(data.trim() === "success"){
            alert("Your Message Sent Successfully ✅");

            let modalElement = document.getElementById('staticBackdrop');
            let modalInstance = bootstrap.Modal.getInstance(modalElement);
            if(modalInstance) modalInstance.hide();

            window.location.href = "https://secure-tm.com/package-form.php";
        } else {
            alert("Error: " + data); // This will show the actual SMTP error if it fails
        }
    })
    .catch(err => {
        console.error("Fetch Error:", err);
        alert("Server connection failed.");
    });
});
</script>