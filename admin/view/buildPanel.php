<?php
include_once '../common/php/databaseConnection.php';
include_once 'model/databaseData.php';
include_once 'controller/folderHandler.php';

class panelData{

  function fetchData(){
    $data=new dataCollecting();
    $codes=$data->getCodes();

    $fetches=array($codes); //0 are rows | 1 are headers
    return $fetches;
  }

}

class panelElements extends panelData{

    function buildMenu(){
      $menu='<ul class="nav nav-tabs" id="Panels">
                  <li class="active"><a href="#" onClick="switchMenu(this)" >Lista kodów</a>
                  <li clas=""><a href="#" onClick="switchMenu(this)" >Lista plików z kodami</a>
              </ul>';
      echo $menu;
    }

    function buildHeaders($data){
      $size=count($data);

      #Display Data
        echo '<thead>';
            echo  '<tr>';
              echo'<th>ID</th>';
              echo'<th>Seria produktu</th>';
              echo'<th>Kod produktu</th>';
              echo'<th>Użyty</th>';
            echo '</tr>';
        echo '</thead>';
    }

    function buildRows($data){

      #Calculate Table sizes
      $rows=count($data);
      $columns=count($data[0]);
          echo '<tbody>';
      #Display Data
        for($x=0;$x<=$rows;$x++){

            echo  '<tr>';
                for($y=0;$y<=$columns-1;$y++){
                  echo '<td>'.$data[$x][$y].'</td>';
            }
            echo '</tr>';
        }
          echo '</tbody>';
    }

    public function buildLogout(){
      $store='<a href="../admin/login.php?status=logout" style="width:150px;"><button type="submit" class="btn btn-warning" style="margin:15px;background-color:black;border-color:black;height:45px;width:110px;">Wyloguj się</button></a>';
      echo $store;
    }

    public function generateCodes($number){
      echo '<section style="margin-top:10px;">';
        echo '<form method="POST" action="../admin/controller/handlers/codeCreation.php?amount='.$number.'">';
          echo '<button style="width:170px;" type="submit" class="btn btn-medium btn-info">Generuj kody - '.$number.'</button>';
        echo '</form>';
      echo '</section>';
    }

}

class panelBuild extends panelElements{

    public function buildTable(){
      #Preapare Data
      $fetched=$this->fetchData();

      #Display Data
      #Functionality
      $this->buildLogout();
      $this->buildMenu();

        #Tables
      foreach($fetched as $num=>$data){ //0 are rows | 1 are headers
        if($num==0){
          #Set Data for JS
            $menu='lista-kodow';
            $id='Lista kodów';
            #Display
            echo '<section id="lista_kodow_wraper"  data-id="'.$id.'" data-type="table-wrapper">';
              echo '<table class="table" id="'.$menu.'" data-id="'.$menu.'">';
                $this->buildHeaders($data[1]);
                $this->buildRows($data[0]);
              echo '</table>';
            echo '</section>';
        }
      }

      $menu='Lista-plikow';
      $id='Lista plików z kodami';

      echo '<section id="lista_plikow_wraper" data-id="'.$id.'" data-type="table-wrapper" style="display:none;">';
        echo '<table class="table" id="'.$menu.'" data-id="'.$menu.'" >';
        echo '<thead>';
              echo '<tr><th>Nazwa pliku</th></tr>';
        echo '</thead>';
          $this->buildFileList();
        echo '</table>';
      echo '</section>';

        #Functionality
      $this->generateCodes(1);
      $this->generateCodes(10);
      $this->generateCodes(100);
      $this->generateCodes(1000);

    }

    public function buildFileList(){ #creates listing of files with codes

      #print created codeFiles
      $folders=new folderHandler();
      $scanned=$folders->listFiles();

      echo '<tbody>';
        foreach($scanned as $oneFile){
        echo '<tr>';
          echo '<td>';
            echo '<a href="/library/codes/'.$oneFile.'" download>';
              echo $oneFile;
            echo '</a>';
          echo '</td>';
        echo '</tr>';
        }
      echo '</tbody>';
    }
}


?>
