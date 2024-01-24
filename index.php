<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <label for="">Choose Image:</label>
  <input type="file" name="imageFile" id="imageFile">
  <span id="img_uploaded"></span>
  <div id="loader">
    <img src="spinner.gif" alt="Spiner">
  </div>


  <script src="jquery.js"></script>
  <script>
    $(document).ready(function() {
      $(document).on("change", "#imageFile", function(event) {
        const img = document.getElementById("imageFile").files[0];
        const img_name = img.name;
        const img_extension = img_name.split(".").pop().toLowerCase();
        if (jQuery.inArray(img_extension, ['png', 'jpg', 'jpeg']) != -1) {
          const img_size = img.size; // bytes
          if (img_size < 1000000) {
            const form_data = new FormData();
            form_data.append("imageFile", img);
            $.ajax({
              url: "upload.php",
              type: 'post',
              data: form_data,
              contentType: false,
              cache: false,
              processData: false,
              beforeSend: function() {
                $("#loader").show();
              },
              success: function(response) {
                $("#img_uploaded").html(response);
                $("#loader").hide();
              },

            });
          } else {
            alert("Image size should be less then or equal to 1MB...")
          }

        } else {
          alert("Image format not suported");
        }
      });
    });
  </script>
</body>

</html>