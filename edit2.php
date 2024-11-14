<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TinyMCE with Cover Image and Category</title>
  <link rel="stylesheet" type="text/css" href="add.css">
  <script src="https://cdn.tiny.cloud/1/yacst7cf17tur5wbxr3jfhgd181xg8plzlvf58yzzogu2ml6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    tinymce.init({
      selector: '#mytextarea',
      plugins: 'image link lists',
      menubar: false,
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image'
    });

    function saveContent() {
      var formData = new FormData();
      var content = tinymce.get("mytextarea").getContent();
      var title = $('#title').val(); // Get title from the hidden input field

      formData.append('content', content);
      formData.append('title', title);

      $.ajax({
        url: 'save_content2.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          alert(response);
        },
        error: function() {
          alert("Error saving content.");
        }
      });
    }
  </script>
</head>
<body>
<?php
  require('config/db.php');

  // Retrieve post by title, assuming title is unique
  $title = mysqli_real_escape_string($conn, $_GET['title']);
  $query = "SELECT * FROM content_table WHERE title = '$title'";
  $result = mysqli_query($conn, $query);
  $post = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  mysqli_close($conn);
?>

<div class="container">
  <div class="kichwa">
    <h1>Edit Post</h1>
    <div class="link"><a href="edit.php"><h1>Add Post</h1></a></div>
  </div>

  <form onsubmit="event.preventDefault(); saveContent();">
    <textarea id="mytextarea" name="content"><?php echo $post['content']; ?></textarea>
    <input type="hidden" id="title" name="title" value="<?php echo $post['title']; ?>"> <!-- Using title as unique identifier -->
    <button type="submit">Submit</button>
  </form>
</div>

</body>
</html>
