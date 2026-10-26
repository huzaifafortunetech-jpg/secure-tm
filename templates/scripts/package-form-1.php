<script>
                document.getElementById("myForm").addEventListener("submit", function(e) {
                    e.preventDefault();
                
                    // Button state change
                    let btn = this.querySelector('button[name="sendmail"]');
                    let originalText = btn.innerHTML;
                    btn.innerHTML = "Processing...";
                    btn.disabled = true;
                
                    // FormData will automatically pick up files because of enctype
                    let formData = new FormData(this);
                
                    fetch("./brief.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(res => res.text())
                    .then(data => {
                        if (data.trim() === "success") {
                            alert("Success! Your trademark brief has been submitted. ✅");
                            window.location.href = "https://secure-tm.com/package-form.php"; // Redirect
                        } else {
                            alert("Error: " + data);
                            btn.innerHTML = originalText;
                            btn.disabled = false;
                        }
                    })
                    .catch(err => {
                        console.error("Error:", err);
                        alert("Server error. Please try again.");
                        btn.disabled = false;
                        btn.innerHTML = originalText;
                    });
                });
                </script>