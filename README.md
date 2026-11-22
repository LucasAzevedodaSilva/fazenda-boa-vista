# Fazenda Boa Vista

Sistema web para comercialização de produtos artesanais da Fazenda Boa Vista, desenvolvido como projeto acadêmico.

## Sobre o projeto

O sistema permite visualizar os produtos da fazenda, consultar detalhes, personalizar o café gourmet, adicionar produtos ao carrinho e finalizar pedidos.

## Prova de Conceito (PoC)

A Prova de Conceito demonstra a jornada principal de compra de produtos da Fazenda Boa Vista.

O usuário pode acessar o catálogo, visualizar os detalhes dos produtos, personalizar o café gourmet, adicionar produtos ao carrinho, alterar quantidades, remover itens e finalizar o pedido, informando seus dados para registro da compra.

A PoC utiliza PHP e MySQL para processar as operações e armazenar os dados dos clientes, pedidos e itens dos pedidos.

## Funcionalidades implementadas

- Página inicial da Fazenda Boa Vista.
- Catálogo dinâmico de produtos.
- Página de detalhes dos produtos.
- Personalização do café gourmet:
  - Tipo: grãos ou moído.
  - Categoria: gourmet ou especial.
  - Torra: clara, média ou escura.
  - Peso: 250 g, 500 g ou 1 kg.
- Carrinho de compras.
- Atualização de quantidades e remoção de produtos.
- Resumo da compra.
- Cadastro dos dados do cliente durante a finalização.
- Registro dos pedidos e respectivos itens no banco de dados.

## Tecnologias utilizadas

- PHP
- HTML
- CSS
- JavaScript
- MySQL
- XAMPP
- Visual Studio Code

## Requisitos para execução

- XAMPP instalado.
- Apache e MySQL.
- Navegador de internet.
- Visual Studio Code (opcional).

## Como instalar e executar o projeto

1. Acesse o repositório do projeto no GitHub:
   https://github.com/LucasAzevedodaSilva/fazenda-boa-vista

2. Baixe o projeto pelo botão **Code → Download ZIP** ou clone o repositório.

3. Coloque a pasta `fazenda-boa-vista` dentro do diretório `htdocs` do XAMPP.

4. Abra o painel de controle do XAMPP e inicie os serviços **Apache** e **MySQL**.

5. Acesse o phpMyAdmin pelo endereço:
   http://localhost/phpmyadmin

6. Crie um banco de dados com o nome:
   `fazenda_boa_vista`

7. Selecione o banco de dados criado, acesse a opção **Importar** e escolha o arquivo:
   `database/fazenda_boa_vista.sql`

8. Confirme a importação do arquivo SQL.

9. Confira as configurações de conexão no arquivo:
   `config/conexao.php`

10. Abra o sistema no navegador:
    http://localhost/fazenda-boa-vista/

## Estrutura do projeto

- `assets/` — arquivos de estilo, imagens e recursos utilizados no sistema.
- `config/` — configuração da conexão com o banco de dados.
- `database/` — arquivo SQL para criação e importação do banco de dados.
- `pages/` — páginas do catálogo, detalhes dos produtos e carrinho.
- `index.php` — página inicial do sistema.
- `README.md` — documentação do projeto.

## Banco de dados

O sistema utiliza MySQL. O arquivo `database/fazenda_boa_vista.sql` contém a estrutura das tabelas e os dados necessários para iniciar o sistema.

As tabelas utilizadas são:

- `produtos`
- `clientes`
- `pedidos`
- `itens_pedido`

## Execução local

O projeto foi desenvolvido para execução em ambiente local utilizando XAMPP, com Apache e MySQL.

## Projeto acadêmico

**Fazenda Boa Vista — Sistema Web para Comercialização de Produtos Artesanais.**

## Integrantes da equipe

- Lucas Azevedo da Silva
- Rhiquelme da Costa Bandeira
- Heitor de Araújo Camargo
- Paulo Vitor Baltazar José