<?php
    #--- /users/self/media/ self means you, where you can use any user id which data want to show ---#
    $url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=ACCESS_TOKEN";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    $result = curl_exec($ch);
    curl_close($ch);
    // echo $result;

    $response = json_decode($result);
    // print_r($response->data);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Instagram Image Showing</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style type="text/css">
    .title {
        background-color: #d4d4d4;
        padding: 15px 0px;
    }
    .img-thumbnail {
        height: 250px;
        margin-top: 10px;
    }
  </style>
</head>
<body>
    <div class="container">
      <div class="title">
        <h3 class="text-center">Instagram Images</h3>
      </div>

      <div class="row">
        <?php foreach ($response->data as $image) { ?>
          
        <?php if(isset($image->carousel_media)) { foreach ($image->carousel_media as $carouselImage) { ?>
        <div class="col-md-3">
          <a href="<?php echo $image->link; ?>" target="_blank">
            <img class="img-responsive img-thumbnail" src="<?php echo $carouselImage->images->standard_resolution->url; ?>">
          </a>
        </div>

        <?php } } else { ?>
        <div class="col-md-3">
          <a href="<?php echo $image->link; ?>" target="_blank">
            <img class="img-responsive img-thumbnail" src="<?php echo $image->images->standard_resolution->url; ?>">
          </a>
        </div>
        <?php } ?>

      <?php } ?>
      </div>

    </div>
</body>
</html>