<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <h2>billing parse test</h2>
      <form action="../backend/billingParse.php" target="reuslt" method="post" enctype="multipart/form-data">
        <label for="iframe">show file in iframe:</label>
        <input name="showIframe" type="checkbox" value="yes"><br><br>
        <label for="fname">upload file:</label>
        <input  type="file" name="file"><br><br>
        <input type="submit" value="Submit">
      </form>
    </div>
    <div class="row">
    <label> I am The iframe:</label><br><br>
    <iframe name="reuslt" width="500" height="500" ></iframe>
    </div>
  </div>
</body>
</html>