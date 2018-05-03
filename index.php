<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- fonts !-->
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="frontend/view/styles/global.css">
    <link rel="stylesheet" href="frontend/view/styles/RWD.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Additional External Scripts !-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  </head>
  <body>

  <section class="content">

    <div class="nameWrapper blackBox">
      <h1> kody </h1>
    </div>

<div class="">
</div>

    <!-- text box editable !-->
    <section class="boldedText">
      <p class="smallInfo">
        Each product package manufactured by **** contains a special code
        with a unique "Product security code" comprising 16 characters.<br/>
        For example: 74a1-27b3-5f87-43b8
        This code is to be used for verification of our product originality.<br/>
      </p>
    </section>

    <div class="warningBox blackBox">
      <u><b>Attention !!! "Product Security Code" may be used just once.</b></u>
  <p>After it is used, the code will be removed from the system.
    Each subsequent attempt to use the code will be failed.</p>
    </div>

    <section class="boldedText">
      <p class="smallInfo" style="font-weight:100;">Insert the 16 characters Product Security Code and Image code into the boxes below and click CHECK
      </p>
    </section>


       <div class="col-md-6">
    <form class="form-inline" action="frontend/controller/userAction.php" method="POST">

            <section class="formColor">
              <div class="form-group">
                <label for="kod1">Product series:</label>
                <input type="text" name="kod1" placeholder="" required class="form-control"/><br/>
              </div><br/>

              <div class="form-group">
                <label for="kod2">Product code:</label>
                <input type="text" name="kod2" placeholder="" required class="form-control"/><br/>
              </div><br/>
            </section>

            <br/><button type="submit" onClick="showModal" class="btn btn-warning validate" style="">Validate</button>

    </form>
      </div>



    <section class="message">

    </section>
  </section>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Modal content-->
<button style="display:none" data-toggle="modal" data-target="#myModal" id="callModal"></button>
  <div id="myModal" class="modal fade" role="dialog" style="">
    <div class="modal-dialog" style="display: flex !important; width: 20%;">

      <div class="modal-content" style="width:100%;height:180px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Informacja</h4>
        </div>

        <div class="modal-body">
          <center>
              <section style="display:flex;justify-content:space-around;flex-wrap:wrap;font-size:15px;">
                      <img src="common/img/load2.gif" style="height:100px;" id="loader"/>
                <?php
                echo '<p id="infoText" style="display:none;">';
                  if(isset($_GET['status'])){
                    if($_GET['status']=='false'){
                      echo 'Przepraszamy, ale ten kod jest niepoprawny lub został już wykorzystany!';
                    }elseif($_GET['status']=='true'){
                      echo 'Kod jest poprawny!';
                    }
                  }
                echo '</p>';
                ?>
              </section>
                  <br/><br/><br/>

          </center>
        </div>

      </div>

    </div>
  </div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Modal content-->

    <script src="admin/view/modal.js"></script>

  </body>
</html>
