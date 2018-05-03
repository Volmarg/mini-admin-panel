<?php

namespace login;

class panel{

  var $partials='';
  var $additionalParts='';

  function __construct(){
    $this->partials=new \login\loginPartials();
    $this->additionalParts=new \login\additionalPartials();
  }

  public function modal(){
          $this->additionalParts->modalStart();
          #login logout message
            echo '<p id="infoText" style="display:none;color:black;">';
              if(isset($_GET['status'])){
                if($_GET['status']=='wrong'){
                  echo 'Złe dane logowania.';
                }elseif($_GET['status']=='logout'){
                    echo 'Wylogowałeś się.';
                }
              }
            echo '</p>';

          $this->additionalParts->modalEnd();
  }

  public function loginForm(){
    echo '<section class="content">';
          $this->additionalParts->loginDescription();
    echo '<form class="form-inline" action="../admin/controller/loginProceed.php" method="POST">';
          $this->partials->userFormPart();
          $this->partials->passwordFormPart();
          $this->partials->submitFormPart();
    echo '</form>

        <section class="message">
        </section>
        </section>';
  }


}

class loginPartials{
  public function userFormPart(){
    echo '<div class="form-group">
            <label for="imie">Login: </label>
            <input type="text" class="form-control" id="imie" name="Login" placeholder="Login" required>
          </div><br/>';
  }

  public function passwordFormPart(){
    echo '<div class="form-group">
            <label for="email">Hasło:</label>
            <input type="password" name="password" placeholder="Hasło" required class="form-control"/>
          </div><br/>';
  }

  public function submitFormPart(){
    echo '<br/><button type="submit" onClick="showModal" class="btn btn-warning" style="background-color:black;border-color:white;height:45px;width:110px;">Zaloguj się</button>';
  }

}

class additionalPartials{
  public function loginDescription(){
    echo '<h1> Zaloguj się</h1>
        <p class="smallInfo"> Podaj dane logowania </p>';
  }

  public function modalStart(){
    echo '<button style="display:none" data-toggle="modal" data-target="#myModal" id="callModal"></button>
      <div id="myModal" class="modal fade" role="dialog" style="">
        <div class="modal-dialog" style="display: flex !important; width: 20%;">

          <div class="modal-content" style="width:100%;height:180px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Informacja</h4>
            </div>

            <div class="modal-body">
              <center>
                  <section style="display:flex;justify-content:space-around;flex-wrap:wrap;font-size:15px;">';
  }

  public function modalEnd(){
    echo '              </section>
                      <br/><br/><br/>

              </center>
            </div>

          </div>

        </div>
      </div>';
  }
}


?>
