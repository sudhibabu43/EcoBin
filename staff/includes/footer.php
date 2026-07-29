</div> <!-- End Row -->
 </div> <!-- End Container -->

 
 <!-- JavaScript -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
  <script> // Get the datepicker input element
    const datepicker = document.getElementById('inputdate');

    // Get the current date
    const currentDate = new Date();

    // Format the current date to match the input's format (yyyy-mm-dd)
    const formattedDate = currentDate.toISOString().split('T')[0];

    // Set the minimum date to today
    datepicker.min = formattedDate;
</script>
<script>
    // Get the timepicker input element
    const timepicker = document.getElementById('inputtime');

    // Set the minimum and maximum time values
    timepicker.min = '07:00';
    timepicker.max = '19:00';
</script>
    
 </body>  
</body>
</html>
