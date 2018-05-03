<?php
.
.
.
.

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="view/styles/global.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- dataTables start !-->
  <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/plug-ins/1.10.16/i18n/Polish.json"></script>


  <!--dataTables end !-->

</head>
  <body>

    <section class="Bar"></section>

    <section class="content">
      <?
        include 'view/buildPanel.php';

        #build table with currently avaiable and used codes
        $panel=new panelBuild();
        $panel->buildTable();


      ?>



    </section>
    <section class="Bar lower"></section>
    <script>

    //Initialize dataTables
        $(document).ready(function() {

          $('#lista-kodow').dataTable( {
            "pageLength": 50,
              "language": {
              "processing":     "Przetwarzanie...",
              "search":         "Szukaj:",
              "lengthMenu":     "Pokaż _MENU_ pozycji",
              "info":           "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
              "infoEmpty":      "Pozycji 0 z 0 dostępnych",
              "infoFiltered":   "(filtrowanie spośród _MAX_ dostępnych pozycji)",
              "infoPostFix":    "",
              "loadingRecords": "Wczytywanie...",
              "zeroRecords":    "Nie znaleziono pasujących pozycji",
              "emptyTable":     "Brak danych",
              "paginate": {
                  "first":      "Pierwsza",
                  "previous":   "Poprzednia",
                  "next":       "Następna",
                  "last":       "Ostatnia"
              },
              "aria": {
                  "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
                  "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
              }
          }
          } );


          $('#Lista-plikow').dataTable( {
            "pageLength": 5,
              "language": {
              "processing":     "Przetwarzanie...",
              "search":         "Szukaj:",
              "lengthMenu":     "Pokaż _MENU_ pozycji",
              "info":           "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
              "infoEmpty":      "Pozycji 0 z 0 dostępnych",
              "infoFiltered":   "(filtrowanie spośród _MAX_ dostępnych pozycji)",
              "infoPostFix":    "",
              "loadingRecords": "Wczytywanie...",
              "zeroRecords":    "Nie znaleziono pasujących pozycji",
              "emptyTable":     "Brak danych",
              "paginate": {
                  "first":      "Pierwsza",
                  "previous":   "Poprzednia",
                  "next":       "Następna",
                  "last":       "Ostatnia"
              },
              "aria": {
                  "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
                  "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
              }
          }
          } );

        });
    </script>
    <script src="view/menu.js"></script>

  </body>
</html>
