<?php
require_once("conexao.php");
@session_start();
?>


<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Calendar</title>
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="dist/simple-calendar.css">
  <link rel="stylesheet" href="assets/demo.css">
</head>
<body>

    <?php
      if (isset($_SESSION['msg'])) {
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
      }
    ?>
  <h1 class="title">Minha agenda</h1>
  <div id="container" class="calendar-container"></div>

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"
          integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
          crossorigin="anonymous"></script>
          
  <script src="dist/jquery.simple-calendar.js"></script>
  
            
            <script>
              var $calendar;
              $(document).ready(function () {
                let container = $("#container").simpleCalendar({
                  fixedStartDay: 0, // begin weeks by sunday
                  disableEmptyDetails: true,
                  events: [
                   

                      <?php 
                        $query = $pdo->query("SELECT * FROM events");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        for ($i=0; $i < count($res); $i++) { 
                          foreach ($res[$i] as $key => $value) {
                          }

                          $descricao = $res[$i]['descricao'];
                          $title = $res[$i]['title'];
                          $start = $res[$i]['start'];
                          $end = $res[$i]['end'];
                          ?>
                          {
                          startDate: "<?php echo date('m/d/Y H:i:s', strtotime($start)); ?>",
                          endDate: "<?php echo date('m/d/Y H:i:s', strtotime($end));?>",
                          summary: '<?php echo @$title ?>',
                          description: '<?php echo @$descricao ?>'
                          },
                          <?php } ?>

                    // generate new event for yesterday at noon
                    
                    
                  ],

                });
                $calendar = container.data('plugin_simpleCalendar')
              });
            </script>
           
         
</body>
</html>
