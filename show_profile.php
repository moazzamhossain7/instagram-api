<?php
    #--- /users/self/media/ self means you, where you can use any user id which data want to show ---#
    $url = "https://api.instagram.com/v1/users/self/?access_token=ACCESS_TOKEN";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    $result = curl_exec($ch);
    curl_close($ch);
    // echo $result;
    // exit;

    $response = json_decode($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Instagram User Profile</title>
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
    p.user-info {
        font-size: 18px;
        font-weight: 500;
        margin: 0;
        padding: 0;
    }
    .col-md-6.text-left.user-data {
        padding: 70px 20px;
    }
    p.user-info.statistics {
        padding-bottom: 25px;
    }
    span {
        margin-right: 20px;
        font-weight: normal;
        color: #2a6911;
    }
    p.user-info.user-name {
        font-weight: 400;
        font-size: 25px;
    }
    p.user-info.bio {
        font-weight: normal;
    }
  </style>
</head>
<body>
    <div class="container">
      <div class="title">
        <h3 class="text-center">Instagram Profile</h3>
      </div>

      <div class="row">
        <div class="col-md-6 text-right">
          <a href="<?php echo $response->data->profile_picture; ?>" target="_blank">
            <img class="img-responsive img-thumbnail rounded-circle" src="<?php echo $response->data->profile_picture; ?>">
          </a>
        </div>
        <div class="col-md-6 text-left user-data">
          <p class="user-info user-name"><?php echo $response->data->username; ?></p>
          <p class="user-info statistics">
            <span> <?php echo $response->data->counts->media.' posts'; ?> </span>
            <span> <?php echo $response->data->counts->followed_by.' followers'; ?> </span> 
            <span> <?php echo $response->data->counts->follows.' following'; ?> </span> 
          </p>
          <p class="user-info full-name"><?php echo $response->data->full_name; ?></p>
          <p class="user-info bio"><?php echo $response->data->bio; ?></p>
        </div>
      </div>

    </div>
</body>
</html>