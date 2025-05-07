<?php
require_once '../config/Database.php';

class UserModel
{
    private $pdo;
    private $table_name = "user";

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    // Método para cadastrar um usuário
    public function cadastrar($nome, $email, $senha): bool
    {
        $query = "INSERT INTO " . $this->table_name . " (name, email, password_hash) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($query);

        // Sanitiza os dados e criptografa a senha
        $nome = htmlspecialchars(strip_tags($nome));
        $email = htmlspecialchars(strip_tags($email));
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        return $stmt->execute([$nome, $email, $senha]);
    }

    public function trocarSenha($email, $senha)
    {
        $query = "UPDATE " . $this->table_name . " SET password_hash = ? WHERE email = ?";
        $stmt = $this->pdo->prepare($query);

        // Sanitiza os dados e criptografa a senha
        $email = htmlspecialchars(strip_tags($email));
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $stmt->execute([$senha, $email]);
    }

    public function acharEmail($email)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function acharNome($nome)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE name = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$nome]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para login de um usuário
    public function login($email, $senha)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ? OR name = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email, $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $hash = $user['senha'] ?? $user['password_hash'] ?? null;
            if ($hash && password_verify($senha, $hash)) {
                return $user;

            }
        }

        return false;
    }

    public function salvar($nome, $nascimento, $sobre, $lembrancas, $valores, $aptidoes, $familia, $amigos, $escola, $sociedade, $fisica, $intelectual, $emocional, $vida_escolar, $gosto, $nao_gosto, $rotina, $lazer, $estudos, $id_user)
    {

        $aptidoes = json_encode($aptidoes);
        $query = "UPDATE " . $this->table_name . " 
        SET name = ?, 
            nascimento = ?, 
            sobre = ?, 
            lembrancas = ?, 
            valores = ?, 
            aptidoes = ?, 
            familia = ?, 
            amigos = ?, 
            escola = ?, 
            sociedade = ?, 
            fisica = ?, 
            intelectual = ?, 
            emocional = ?, 
            vida_escolar = ?, 
            gosto = ?, 
            nao_gosto = ?, 
            rotina = ?, 
            lazer = ?, 
            estudos = ? 
        WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$nome, $nascimento, $sobre, $lembrancas, $valores, $aptidoes, $familia, $amigos, $escola, $sociedade, $fisica, $intelectual, $emocional, $vida_escolar, $gosto, $nao_gosto, $rotina, $lazer, $estudos, $id_user]);
    }

    public function buscarPorId($user_id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function salvarImagem($file, $user_id)
    {
        if (isset($file)) {
            $foto = $_FILES['foto'];

            $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($foto['type'], $tiposPermitidos)) {
                $dadosImagem = file_get_contents($foto['tmp_name']);
                $nomeImagem = $foto['name'];
                $tipo = $foto['type'];
                $tamanho = $foto['size'];

                $sql = "INSERT INTO fotos (nome, conteudo, tipo, tamanho, user_id)
                VALUES (:nome, :conteudo, :tipo, :tamanho, :user_id)";

                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':nome', $nomeImagem);
                $stmt->bindParam(':conteudo', $dadosImagem, PDO::PARAM_LOB);
                $stmt->bindParam(':tipo', $tipo);
                $stmt->bindParam(':tamanho', $tamanho);
                $stmt->bindParam(':user_id', $user_id);

                if ($stmt->execute()) {
                    echo json_encode(['sucesso' => true, 'mensagem' => 'Foto salva com sucesso!']);
                } else {
                    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao salvar no banco de dados.']);
                }
            } else {
                echo json_encode(['sucesso' => false, 'mensagem' => 'Formato de imagem inválido. Use JPEG, PNG ou GIF.']);
            }
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Nenhuma imagem enviada.']);
        }
    }

    public function buscarImagem($user_id)
    {
        $sql = "SELECT conteudo, tipo FROM fotos WHERE user_id = :id ORDER BY id DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $foto = $stmt->fetch(PDO::FETCH_ASSOC);
            header("Content-Type: " . $foto['tipo']);
            echo $foto['conteudo'];
        } else {
            // Imagem padrão
            $default = '../public/default.png'; // ajuste o caminho se necessário
            if (file_exists($default)) {
                header("Content-Type: image/png");
                readfile($default);
            } else {
                header("Content-Type: text/plain");
                echo 'Imagem não disponível.';
            }
        }
    }

    public function buscarPlanejamentoFuturo($userId)
    {
        $sql = "SELECT * FROM planejamento_futuro WHERE user_id = :user_id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function salvarPlanejamentoFuturo($dados)
    {
        // Verifica se já existe um registro para este usuário
        $checkSql = "SELECT id FROM planejamento_futuro WHERE user_id = :user_id";
        $checkStmt = $this->pdo->prepare($checkSql);
        $checkStmt->execute([':user_id' => $dados['user_id']]);
        $registroExistente = $checkStmt->fetch();

        if ($registroExistente) {
            // UPDATE
            $sql = "UPDATE planejamento_futuro SET 
                    inspiracoes = :inspiracoes,
                    sonhos_infancia = :sonhos_infancia,
                    sonhos_momento = :sonhos_momento,
                    objetivo_curto_prazo = :objetivo_curto_prazo,
                    objetivo_medio_prazo = :objetivo_medio_prazo,
                    objetivo_longo_prazo = :objetivo_longo_prazo,
                    visao_10_anos = :visao_10_anos,
                    profissao_desejada = :profissao_desejada,
                    detalhes_profissao = :detalhes_profissao,
                    area_atuacao = :area_atuacao,
                    salario_estimado = :salario_estimado
                WHERE user_id = :user_id";
        } else {
            // INSERT
            $sql = "INSERT INTO planejamento_futuro (
                    user_id, inspiracoes, sonhos_infancia, sonhos_momento,
                    objetivo_curto_prazo, objetivo_medio_prazo, objetivo_longo_prazo, visao_10_anos,
                    profissao_desejada, detalhes_profissao, area_atuacao, salario_estimado
                ) VALUES (
                    :user_id, :inspiracoes, :sonhos_infancia, :sonhos_momento,
                    :objetivo_curto_prazo, :objetivo_medio_prazo, :objetivo_longo_prazo, :visao_10_anos,
                    :profissao_desejada, :detalhes_profissao, :area_atuacao, :salario_estimado
                )";
        }

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':user_id' => $dados['user_id'],
            ':inspiracoes' => $dados['inspiracoes'],
            ':sonhos_infancia' => $dados['sonhos_infancia'],
            ':sonhos_momento' => $dados['sonhos_momento'],
            ':objetivo_curto_prazo' => $dados['curto_prazo'],
            ':objetivo_medio_prazo' => $dados['medio_prazo'],
            ':objetivo_longo_prazo' => $dados['longo_prazo'],
            ':visao_10_anos' => $dados['visao_10_anos'],
            ':profissao_desejada' => $dados['profissao_desejada'],
            ':detalhes_profissao' => $dados['detalhes_profissao'],
            ':area_atuacao' => $dados['area_atuacao'],
            ':salario_estimado' => $dados['salario_estimado'],
        ]);
    }

    public function getMelhoriasPessoais($userId)
    {
        $sql = "SELECT * FROM melhorias_pessoais WHERE user_id = :user_id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function salvarMelhoriasPessoais($userId, $dados)
    {
        // Verifica se já existe
        $sql = "SELECT id FROM melhorias_pessoais WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $campos = [
            'rel_fam_melhoria', 'rel_fam_prazo',
            'estudos_melhoria', 'estudos_prazo',
            'saude_melhoria', 'saude_prazo',
            'profissao_melhoria', 'profissao_prazo',
            'amigos_melhoria', 'amigos_prazo',
            'comunidade_melhoria', 'comunidade_prazo',
            'tempo_melhoria', 'tempo_prazo',
            'religiao_melhoria', 'religiao_prazo',
            'namorado_melhoria', 'namorado_prazo'
        ];

        if ($stmt->fetch()) {
            // UPDATE
            $setPart = implode(', ', array_map(fn($campo) => "$campo = :$campo", $campos));
            $sql = "UPDATE melhorias_pessoais SET $setPart, updated_at = NOW() WHERE user_id = :user_id";
        } else {
            // INSERT
            $colunas = implode(', ', array_merge(['user_id'], $campos));
            $valores = implode(', ', array_map(fn($campo) => ":$campo", array_merge(['user_id'], $campos)));
            $sql = "INSERT INTO melhorias_pessoais ($colunas) VALUES ($valores)";
        }

        $stmt = $this->pdo->prepare($sql);

        // Bind dos dados
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        foreach ($campos as $campo) {
            $stmt->bindValue(":$campo", $dados[$campo] ?? null);
        }

        return $stmt->execute();
    }


}
