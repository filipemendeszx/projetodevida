<!doctype html>
<html>

<head>
  <title>Teste de Personalidade DISC</title>
  <link rel='stylesheet' href='css/disc.css' />
</head>

<body> 
   
  <header>
  <div class="seta">
      <a href="views/home.php"><img src="arrow.png" alt=""></a>
    </div>
    <h1>Resultado do Teste de Personalidade </h1>
  </header>
  <?php
  if (isset($_POST['m']) && isset($_POST['l'])) {
    include 'inc/db.php';
    include 'inc/formula.php';
    $most = array_count_values($_POST['m']);
    $least = array_count_values($_POST['l']);
    $result = array();
    $aspect = array('D', 'I', 'S', 'C', 'N');
    foreach ($aspect as $a) {
      $result[$a][1] = isset($most[$a]) ? $most[$a] : 0;
      $result[$a][2] = isset($least[$a]) ? $least[$a] : 0;
      $result[$a][3] = ($a != 'N' ? $result[$a][1] - $result[$a][2] : 0);
    }
    $line1 = getPattern($db, $result, 1);
    $line2 = getPattern($db, $result, 2);
    $line3 = getPattern($db, $result, 3);
  ?>
    <div id='container'>
      <script src="js/raphael.min.js"></script>
      <script src="js/jquery.min.js"></script>
      <script src="js/morris.min.js"></script>
      <script>
        $(function() {
          Morris.Line({
            element: 'graph',
            data: [
              <?php
              echo "
            { y: 'D', a: {$line1[0]->d}, b:{$line2[0]->d}, c:{$line3[0]->d}},
            { y: 'I', a: {$line1[0]->i},  b:{$line2[0]->i}, c:{$line3[0]->i}},
            { y: 'S', a: {$line1[0]->s},  b:{$line2[0]->s}, c:{$line3[0]->s}},
            { y: 'C', a: {$line1[0]->c},  b:{$line2[0]->c}, c:{$line3[0]->c}},
            ";
              ?>
            ],
            xkey: 'y',
            ykeys: ['a', 'b', 'c'],
            parseTime: false,
            labels: ['Eu Mais Público', 'Eu Menos Privado', 'Mudança Eu Percebido'],
            ymax: 8,
            ymin: -8
          });
        });
      </script>
      <!-- Aqui o gráfico será exibido -->
      <div id="graph" style="height: 400px;"></div>
    </div>
    <div>
      <br>
      <br>
      <br>
      <br>

      <div class="luisao">
        <h1>RESULTADO</h1>
        <br>
        <br>
        <div class="sla">
          <div class="carater">
            <h2>Descrição do Caráter</h2>
            <div class="linha"></div>
            <b>Personalidade em público</b><br />
            <?php
            echo "<h3>{$line1[1]->pattern}</h3>";
            echo "<ul><li>" . implode('</li><li>', explode(',', $line1[1]->behaviour)) . "</li></ul>";
            ?>
            <br>
            <br>
            <b>Personalidade sob pressão</b><br />
            <?php
            echo "<h3>{$line2[1]->pattern}</h3>";
            echo "<ul><li>" . implode('</li><li>', explode(',', $line2[1]->behaviour)) . "</li></ul>";
            ?>
            <br>
            <br>
            <b>Personalidade oculta</b><br />
            <?php
            echo "<h3>{$line3[1]->pattern}</h3>";
            echo "<ul><li>" . implode('</li><li>', explode(',', $line3[1]->behaviour)) . "</li></ul>";
            ?>
          </div>
          <div class="carater">
            <h2>Descrição da Personalidade</h2>
            <div class="linha"></div>
            <br>
            <br>
            <?php
            echo "<p>{$line3[1]->description}</p>";
            ?>
          </div>
          <div class="carater">
            <h2>Compatibilidade com o Cargo</h2>
            <div class="linha"></div>
            <br>
            <br>
            <?php
            echo "<ul><li>" . implode('</li><li>', explode(',', $line3[1]->jobs)) . "</li></ul>";
            ?>
          </div>
        </div>
      </div>
    <?php
  }
    ?>
    <footer class="footer">
      <p> © 2025 Projeto de vida. Todos os Direitos Reservados.</p>
      <p>
        Powered by
        <a href="https://www.instagram.com/filipeemendesx/" target="_blank">
          https://www.instagram.com/filipemendesx
        </a>
      </p>
    </footer>
</body>

</html>