# Fazenda Boa Vista

Sistema web para comercialização de produtos artesanais da Fazenda Boa Vista, desenvolvido como projeto acadêmico.

## Sobre o projeto

O sistema permite visualizar produtos da fazenda, consultar detalhes, personalizar o café gourmet, adicionar produtos ao carrinho e finalizar pedidos.

## Tecnologias utilizadas

- PHP
- HTML
- CSS
- JavaScript
- MySQL
- XAMPP
- Visual Studio Code

## Estrutura do projeto

- `assets/` – arquivos CSS, JavaScript e imagens.
- `config/` – conexão com o banco de dados.
- `database/` – arquivo SQL para criação e preenchimento do banco.
- `pages/` – páginas de produtos e funcionalidades do carrinho.
- `index.php` – página inicial do sistema.

## Requisitos para execução

- XAMPP instalado.
- Apache e MySQL.
- Navegador de internet.
- Visual Studio Code (opcional).

## Como executar o projeto

1. Copie a pasta `fazenda-boa-vista` para o diretório `htdocs` do XAMPP.
2. Abra o painel de controle do XAMPP e inicie os serviços Apache e MySQL.
3. Acesse `http://localhost/phpmyadmin`.
4. Crie um banco de dados chamado `fazenda_boa_vista`.
5. Importe o arquivo `database/fazenda_boa_vista.sql` para esse banco.
6. Confira as configurações de conexão no arquivo `config/conexao.php`.
7. Abra o navegador e acesse:

   `http://localhost/fazenda-boa-vista/`

## Banco de dados

O banco utilizado é o MySQL. O arquivo SQL disponibilizado na pasta `database` contém a estrutura das tabelas e os dados necessários para iniciar o sistema.

## Execução local

O sistema foi desenvolvido para execução em ambiente local utilizando XAMPP, com Apache e MySQL.