# Fazenda Boa Vista

Sistema web para comercialização de produtos artesanais da Fazenda Boa Vista, desenvolvido como projeto acadêmico.

## Sobre o projeto

O sistema permite visualizar produtos da fazenda, consultar detalhes, personalizar o café gourmet, adicionar produtos ao carrinho e finalizar pedidos.

## Tecnologias utilizadas

- PHP
- HTML5
- CSS3
- MySQL
- XAMPP
- Visual Studio Code

## Funcionalidades implementadas

- Página inicial do sistema.
- Catálogo dinâmico de produtos.
- Página de detalhes dos produtos.
- Personalização do café gourmet.
- Carrinho de compras.
- Atualização de quantidades e remoção de produtos.
- Finalização de pedidos.
- Registro dos pedidos no banco de dados.

## Estrutura do projeto

- `assets/` – arquivos CSS, JavaScript e imagens.
- `config/` – conexão com o banco de dados.
- `database/` – arquivo de exportação do banco de dados.
- `pages/` – páginas do sistema.
- `pages/carrinho/` – funcionalidades do carrinho e finalização dos pedidos.

## Como executar o projeto

1. Instale o XAMPP.
2. Inicie os módulos Apache e MySQL.
3. Copie a pasta `fazenda-boa-vista` para o diretório `htdocs` do XAMPP.
4. Acesse o phpMyAdmin pelo endereço `http://localhost/phpmyadmin`.
5. Crie um banco de dados chamado `fazenda_boa_vista`.
6. Importe o arquivo `fazenda_boa_vista.sql`, localizado na pasta `database`.
7. Verifique as configurações de conexão no arquivo `config/conexao.php`.
8. Abra o sistema no navegador pelo endereço:

   `http://localhost/fazenda-boa-vista/`

## Banco de dados

O sistema utiliza o banco de dados MySQL, com tabelas para armazenamento de produtos, clientes, pedidos e itens dos pedidos.

## Execução local

O sistema foi desenvolvido para execução em ambiente local utilizando XAMPP, com Apache e MySQL.