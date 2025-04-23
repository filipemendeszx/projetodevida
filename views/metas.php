<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Tomando Decisões</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>


<header class="header">
    <div class="title-group">
      <div class="title">Projeto <span class="highlight">de vida</span></div>
      <div class="subtitle">Filipe Mendes</div>
    </div>
    <nav class="botao">
      <a href="#">Início</a>
      <a href="index.php?action=sobre">Sobre mim &#9662;</a>
      <a href="index.php?action=perfil"><img src="Filipe.png" alt="Perfil" class="profile"></a>
      <a href="index.php?action=logout">sair</a>
    </nav>
  </header>
  <br>
  <br>
  <br>
  <h1>Tomando Decisões e Estabelecendo<br>Metas</h1>

  <form id="form">
    <div class="container">
      <!-- Repetição de cartões -->
      <div class="card">
        <h2>Relacionamento Familiar</h2>
        <div class="label">Como irei fazer para melhorar</div>
        <textarea name="rel_fam_melhoria" placeholder="EX: Vou melhorar conversando mais..."></textarea>
        <div class="label">Prazo para essa ação</div>
        <textarea name="rel_fam_prazo" placeholder="EX: Até o final do ano."></textarea>
      </div>

      <div class="card">
        <h2>Estudos</h2>
        <div class="label">Como irei fazer para melhorar</div>
        <textarea name="estudos_melhoria" placeholder="EX: Vou estudar mais..."></textarea>
        <div class="label">Prazo para essa ação</div>
        <textarea name="estudos_prazo" placeholder="EX: Até o final do ano."></textarea>
      </div>

      <div class="card">
        <h2>Saúde</h2>
        <div class="label">Como irei fazer para melhorar</div>
        <textarea name="saude_melhoria" placeholder="EX: Vou melhorar minha alimentação..."></textarea>
        <div class="label">Prazo para essa ação</div>
        <textarea name="saude_prazo" placeholder="EX: Até o final do ano."></textarea>
      </div>

      <div class="card">
        <h2>Futura Profissão</h2>
        <div class="label">Como irei fazer para melhorar</div>
        <textarea name="profissao_melhoria" placeholder="EX: Vou me dedicar mais..."></textarea>
        <div class="label">Prazo para essa ação</div>
        <textarea name="profissao_prazo" placeholder="EX: Até o final do ano."></textarea>
      </div>

      <div class="card">
        <h2>Amigos</h2>
        <div class="label">Como irei fazer para melhorar</div>
        <textarea name="amigos_melhoria" placeholder="EX: Vou melhorar conversando mais..."></textarea>
        <div class="label">Prazo para essa ação</div>
        <textarea name="amigos_prazo" placeholder="EX: Até o final do ano."></textarea>
      </div>

      <div class="card">
        <h2>Comunidade</h2>
        <div class="label">Como irei fazer para melhorar</div>
        <textarea name="comunidade_melhoria" placeholder="EX: Vou melhorar conversando mais..."></textarea>
        <div class="label">Prazo para essa ação</div>
        <textarea name="comunidade_prazo" placeholder="EX: Até o final do ano."></textarea>
      </div>

      <div class="card">
        <h2>Tempo Livre</h2>
        <div class="label">Como irei fazer para melhorar</div>
        <textarea name="tempo_melhoria" placeholder="EX: Vou me dedicar mais..."></textarea>
        <div class="label">Prazo para essa ação</div>
        <textarea name="tempo_prazo" placeholder="EX: Até o final do ano."></textarea>
      </div>

      <div class="card">
        <h2>Religião</h2>
        <div class="label">Como irei fazer para melhorar</div>
        <textarea name="religiao_melhoria" placeholder="EX: Vou melhorar indo mais à igreja..."></textarea>
        <div class="label">Prazo para essa ação</div>
        <textarea name="religiao_prazo" placeholder="EX: Até o final do ano."></textarea>
      </div>

      <div class="card">
        <h2>Namorado(a)</h2>
        <div class="label">Como irei fazer para melhorar</div>
        <textarea name="namorado_melhoria" placeholder="EX: Vou melhorar conversando mais..."></textarea>
        <div class="label">Prazo para essa ação</div>
        <textarea name="namorado_prazo" placeholder="EX: Até o final do ano."></textarea>
      </div>
    </div>

    <div class="buttons">
      <button type="submit">Enviar</button>
      <button type="reset">Limpar</button>
    </div>
  </form>

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
