  <script>
    // Live toast action
  // var toastTrigger = document.getElementById('liveToastBtn')
  // var toastLiveExample = document.getElementById('liveToast')
  // if (toastTrigger) {
  //   toastTrigger.addEventListener('click', function () {
  //     var toast = new bootstrap.Toast(toastLiveExample)

  //     toast.show()
  //   })

  function toastDisplay(){ 

    
    let sessionMessage = sessionStorage.getItem('message');
    console.log(sessionMessage);

  if (sessionMessage) {

    // Show the toast
    var toast = new bootstrap.Toast(document.getElementById('liveToast'));
    toast.show();
    
    // Clear the session_message to avoid showing the same message again
    sessionStorage.removeItem('message');

  }
  }

  </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>


<script>
  // Trigger toast
 toastDisplay();
<?php 

// Clear from Session
 if(isset($_SESSION['message'])){
 unset($_SESSION['message']);
  }
?>

</script>

</body>

</html>