# Template: Deploy PHP no InfinityFree com GitHub Actions + FTP

Este repositorio e um modelo para publicar um site PHP (deploy) no InfinityFree automaticamente a cada `push` na branch `main`.

## O que há template

- Site PHP simples de exemplo (`index.php`)
- Workflow de deploy automatico via FTP (`.github/workflows/deploy.yml`)
- Guia rapido para configurar no GitHub e no InfinityFree

## 1) Criar repositorio a partir do template

1. Clique em **Use this template** no GitHub.
2. Crie um novo repositorio (ex.: `meu-site-php`).
3. Clone no computador e edite os arquivos do site.

## 2) Criar conta e projeto no InfinityFree

1. Crie a conta no InfinityFree.
2. Crie o dominio/subdominio do site.
3. No painel do InfinityFree, abra dados de FTP da conta hospedada.

Voce vai precisar destes dados:

- `FTP_SERVER`
- `FTP_USERNAME`
- `FTP_PASSWORD`
- `FTP_SERVER_DIR` (normalmente `/htdocs/`)

## 3) Configurar secrets no GitHub

No repositorio: **Settings > Secrets and variables > Actions > New repository secret**

Crie os 4 secrets abaixo:

- `FTP_SERVER` -> servidor FTP (ex.: `ftpupload.net`)
- `FTP_USERNAME` -> usuario FTP
- `FTP_PASSWORD` -> senha FTP
- `FTP_SERVER_DIR` -> diretorio remoto (ex.: `/htdocs/`)

## 4) Como funciona o deploy

Toda vez que houver `push` na branch `main`, o workflow:

1. Faz checkout do codigo
2. Valida sintaxe dos arquivos PHP
3. Envia os arquivos para o InfinityFree via FTP

Tambem e possivel disparar manualmente em **Actions > Deploy PHP site to InfinityFree (FTP) > Run workflow**.

## 5) Estrutura inicial

- `.github/workflows/deploy.yml` -> pipeline de deploy
- `index.php` -> pagina inicial
- `assets/css/style.css` -> estilo da pagina

## 6) Dicas

- Trabalhar sempre na branch `main` (ou ajustar o workflow para outra branch).
- Não commitar senhas no repositorio.
- Se der erro de autenticacao FTP, revisar os `Secrets`.
- Se o site não atualizar, verificar no log do GitHub Actions se o upload foi concluido.


