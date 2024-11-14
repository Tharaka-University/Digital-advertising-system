<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TinyMCE with Cover Image and Category</title>
  <link rel="stylesheet" type="text/css" href="add.css">
  <script src="https://cdn.tiny.cloud/1/yacst7cf17tur5wbxr3jfhgd181xg8plzlvf58yzzogu2ml6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery for AJAX -->

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
      var title = $('#title').val();
      var category = $('#category').val();
      var imageFile = $('#cover_image')[0].files[0];

      formData.append('content', content);
      formData.append('title', title);
      formData.append('category', category);
      formData.append('cover_image', imageFile);

      $.ajax({
        url: 'save_content.php',
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
  
  <div class="container">

    <div class="kichwa">
      <div><h1>Add Post</h1></div>
    
    <div class="link"><a href="edit.php"><h1>  edit post</h1></a></div>
    <div class="link"><a href="the student.php"><h1>  cover page</h1></a></div>
    </div>

    <form onsubmit="event.preventDefault(); saveContent();">
      <div>
        <input type="text" id="title" name="title" placeholder="Enter the title of your article" required>
      
      </div>
      
      <div><input list="categoryOptions" id="category" name="category" placeholder="Select or enter category" required>
      <datalist id="categoryOptions">
        <option value="Technology">
        <option value="lifestyle">
        <option value="Health">
        <option value="education">
        <option value="Entertainment">

      </datalist></div>
      
      <div><input type="file" id="cover_image" name="cover_image" accept="image/*" required></div>
      
      <textarea id="mytextarea" name="content">Welcome. Add your article here.</textarea>
      <button type="submit">Submit</button>
    </form>
  </div>

</body>
</html>
