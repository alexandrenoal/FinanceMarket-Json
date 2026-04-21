<?php
session_start();

class Auth {
    private string $arquivo = 'usuarios.json';

    // Método para buscar todos os usuários do arquivo
    private function carregarUsuarios(): array {
        if (!file_exists($this->arquivo)) return [];
        $dados = file_get_contents($this->arquivo);
        return json_decode($dados, true) ?? [];
    }

    // Método para realizar o login
    public function login(string $email, string $senha): bool {
    $usuarios = $this->carregarUsuarios();
    
    // Limpa espaços em branco acidentais
    $email = trim($email);
    $senha = trim($senha);

    foreach ($usuarios as $user) {
        // Compara o e-mail (também limpando espaços do banco)
        if (trim($user['email']) === $email) {
            // Verifica se a senha criptografada confere
            if (password_verify($senha, $user['password'])) {
                $_SESSION['usuario_nome'] = $user['nome'];
                $_SESSION['logado'] = true;
                return true;
            }
        }
    }
    return false;
    }

    // Método auxiliar para você criar seu primeiro usuário via código
    public function cadastrar(string $nome, string $email, string $senha): void {
        $usuarios = $this->carregarUsuarios();
        $usuarios[] = [
            'nome' => $nome,
            'email' => $email,
            'password' => password_hash($senha, PASSWORD_DEFAULT)
        ];
        file_put_contents($this->arquivo, json_encode($usuarios, JSON_PRETTY_PRINT));
    }

    // Cadastra o usuario
    public function emailExiste(string $email): bool {
        $usuarios = $this->carregarUsuarios();
        foreach ($usuarios as $user) {
            if ($user['email'] === $email) return true;
        }
        return false;
    }
}
