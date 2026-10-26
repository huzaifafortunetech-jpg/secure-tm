<script>
  document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
      const modalEl = document.getElementById('staticBackdrop');
      if (modalEl) {
        const modal = new bootstrap.Modal(modalEl);
        modal.show();
      }
    }, 15000); // 15 seconds = 15000 ms
  });
</script>