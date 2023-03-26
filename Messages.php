<?php
include './config/conn.php';
include './config/session.php';

function urlFetcher()
{

    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = "https://";
    } else {
        $url = "http://";
    }
    $url .= $_SERVER['HTTP_HOST'];
    $url .= $_SERVER['REQUEST_URI'];
    $user_id = (int) filter_var($url, FILTER_SANITIZE_NUMBER_INT);
    return $user_id;
}


  





    //  all user fetcher----------------------------------------------------------------------------------------------------------------------------------------------------------------------

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message :<?php echo "user_to" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--  google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Poppins:wght@500;600&family=Raleway&family=Roboto&display=swap" rel="stylesheet">
    <!--  fonts imports ends here -->
    <!-- fontawesome icons -->
    <script src="https://kit.fontawesome.com/8dc03a4776.js" crossorigin="anonymous"></script>

    <script src="jquery-3.6.3.min.js"></script>

    <!-- fontawesome icons -->
    <link rel="stylesheet" href="./style.css">
    <style>
        section {
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .messageCont {
            height: 80vh;
            width: 60vw;
        }

        .messageCont div {
            height: 100%;
            display: flex;
            flex-direction: column;

        }
    </style>
</head>

<body class="container-fluid d-flex justify-content-center align-items-center">
<?php
include "./Components/Header.php";
include "./Components/NavbarResponsive.php";
?>

    <section class="bg-secondary text-white d-flex justify-content-center align-items-center"  >
        <div class="container bg-dark d-flex flex-row justify-content-center align-items-center" style="height:80%;" >
            <div class="col-sm-3 py-2 border-2 border-end border-secondary d-flex flex-column justify-content-start align-items-center" style="height:100%;" >
            <!--  user Selector -->
                <div class="py-2 container-fluid" style="height:10%" >
                    <form class="d-flex flex-column" action="" method="post">
                        <small class="text-left text-white">
                            Other members
                        </small>
                        <select name="selectUser" id="selectUser" class="px-1 border-0 rounded-0 py-2 text-dark" onchange="fetchDirectMessageMethod(event)" >
                           <?php 
                           $sql = "SELECT usernameReg,emailReg FROM `user`";
                           $res = mysqli_query($conn, $sql);
                           $emparray = array();
                           if ($res) {
                               while ($row = $res->fetch_assoc()) {
                                    if($row['usernameReg'] != $_SESSION['userName'] ){
                                        $emparray[]  = $row;
                                    }
                               }
                           }
                           echo '<script>
                                    var allUser = '.json_encode($emparray).';
                                    var selectUser = document.getElementById("selectUser");
                                    var content = allUser.map((d)=>{
                                      return `<option value="${d.usernameReg}"> ${d.usernameReg} </option>` 
                                   })
                                   selectUser.innerHTML = content;
                                </script>';
                           ?>
                        </select>
                    </form>
                    <div class="row py-2 mt-1">
                           <?php
                                    $user_to_id = urlFetcher();
                                    $sql2 = "SELECT * FROM `user` WHERE id = ".$user_to_id."";
                                    $res2 = mysqli_query($conn,$sql2);
                                    $user_to = array();
                                    if($res2){
                                          while($row = $res2->fetch_assoc()){
                                                $user_to = $row;
                                                if($user_to){
                                                    echo "<li class='container-fluid bg-success mb-1 py-2' >".$user_to['userNameReg']."</li>";
                                                }
                                          }
                                    }  
                           ?>
                    </div>
                </div>
                <!--  recent users -->
                <div class="container-fluid py-2" id="allConversedUser" style="height:60%;"  >
                     
                </div>
                fetch all user organization...you Added
            </div>
            <div class="col-sm-8 bg-dark border-secondary d-flex flex-column justify-content-end align-items-center container-fluid">
                <div class="col-sm-12 col-lg-12 user_to_info" style="height:74vh;width:100%;">
                <div class="row d-flex flex-row justify-content-center align-items-center border-bottom border-secondary border-opacity-50" style="height:10%; width : 100%" >
                      <div class="col-sm-2 d-flex align-items-center justify-content-center" style="height:100%;"  >
                          <img src="#" alt="profile">
                      </div>
                      <div class="col-sm-9 d-flex flex-row justify-content-end align-items-center px-2" style="height:100%;" >
                              <?php
                              if(isset($_SESSION['loggedInStatus'])){
                                  echo $_SESSION["userName"];
                              }
                              ?>
            
                      </div>
                      <div class="col-sm-1 d-flex align-items-center justify-content-center" style="height:100%;" >
                          <button class="btn border-0 bg-transparent"  >
                              <i class="fa fa-ellipsis-v text-secondary" style="font-size:23px" ></i>
                          </button>
                      </div>
                </div>
                 <div class="bg-success d-flex flex-column align-items-center justify-content-center" style="height:80%;width:100%" >
                    <!--  messages -->

                    <?php
                               
                          $sql  = 'SELECT * from `messages`';
                          $res  = mysqli_query($conn,$sql);

                          if($res){
                             while($row = $res->fetch_assoc()){
                                   echo $row;
                             }
                          }else{
                              echo "cannot get any data";
                          }
                    ?>

                 </div>    
                <!--  message fetching cont -->
                </div>
                <div class=" d-flex flex-row justify-content-start align-items-center bg-warning" style="height:10%;width:100%">
                    <div id="messagingHelperIcon" class="col-sm-2 d-flex flex-row justify-content-center align-items-center">
                        <button type="button" class="bg-transparent text-white border-0 mx-1 p-2">
                            <i class="fa fa-thumb-tack" style="font-size:23px" ></i>
                        </button>
                        <button type="button" class="bg-transparent text-white border-0 mx-1 p-2">
                            <i class="fa fa-microphone" style="font-size:23px" ></i>
                        </button>
                    </div>
                    <form action="" class="col-sm-8" method="post">
                        <input type="text" place="Write Your Message Here" name="messageCreator" class="border-0 col-sm-10 rounded-5 px-2 py-1">
                        <input type="submit" value="Send" class=" text-dark" name="messageSender">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        var selectedUser = '';
         function fetchDirectMessageMethod(event){
            var data = JSON.stringify(event.target.value);
             return data; 
        } 
        selectedUser = fetchDirectMessageMethod(event);
         
    </script>
</body>

</html>