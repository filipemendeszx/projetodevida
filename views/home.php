<?php
require_once 'Database.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto de vida</title>
    <link rel="stylesheet" href="style/estileira.css">
</head>
<body>
  
<header class="header">
    <div class="title-group">
      <div class="title">Projeto <span class="highlight">de vida</span></div>
      <div class="subtitle">Filipe Mendes</div>
    </div>
    <nav class="botao">
      
      <a href="index.php?action=sobre">Sobre mim &#9662;</a>
      <a href="index.php?action=perfil"><img src="Filipe.png" alt="Perfil" class="profile"></a>
      <a href="index.php?action=logout">sair</a>
    </nav>
  </header>
    <section class="card-section">
    <div class="card-line">
        <div class="card">
          <h2>Teste sua Personalidade: Descubra <br> Mais Sobre Você!</h2>
          <p>
            Cada pessoa tem uma maneira única de lidar com desafios, tomar decisões e se relacionar com o mundo ao seu redor.
            Sua personalidade influencia sua forma de trabalhar, se comunicar e até de buscar equilíbrio entre a vida pessoal e profissional.
            Este teste rápido vai ajudá-lo a entender melhor seus pontos fortes, sua abordagem diante de desafios e como você encara o dia a dia.
            Descubra mais sobre você agora!
          </p>
        </div>
        <a href="index.php?action=quemsoueu">
        <div class="card">
          <h2>Quem sou eu ?</h2>
          <p>
            Cada pessoa é única, com histórias, experiências e características que a tornam especial. Quem é você? O que te motiva?
            Como você enxerga a vida e o mundo ao seu redor?
            Este espaço é para você se descrever, explorar sua personalidade e expressar quem realmente é.
            Fale sobre seus valores, paixões, desafios e conquistas. Defina-se com suas próprias palavras!
          </p>
        </div></a>
    </div>
<a href="index.php?action=planejamento">
    <div class="card-line">
        <div class="card">
          <h2>Planejamento de futuro</h2>
          <p>
            Cada pessoa tem um pensamento de futuro diferente. Enquanto uns sonham alto, outros preferem metas simples, mas cheias de significado.
            O futuro é algo que construímos aos poucos, com escolhas diárias, aprendizados e coragem para mudar.
            Mais do que planejar cada passo, é importante se conhecer, entender o que faz sentido e seguir com propósito.
            Não existe um caminho certo — existe o seu caminho. E ele começa agora.
          </p>
        </div></a>
       <a href="index.php?action=metas"> <div class="card">
          <h2>Plano de Ação<br>(Tomando Decisões)</h2>
          <p>
            Tomar decisões nem sempre é fácil, mas é essencial para quem deseja transformar sonhos em realidade.
            Um plano de ação começa com clareza: saber onde se quer chegar e o porquê desse caminho.
            Depois, vem a parte mais importante — agir. Cada pequeno passo conta, cada escolha nos aproxima (ou afasta) do que buscamos.
            Decidir é ter coragem de sair do lugar, mesmo com medo.
            É assumir o controle da própria história e seguir com intenção. O futuro começa quando a gente escolhe se mover.
          </p>
        </div></a>
    </div>
  </section>

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