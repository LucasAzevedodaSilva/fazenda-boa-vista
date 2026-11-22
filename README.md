# Fazenda Boa Vista

Sistema web para comercialização de produtos artesanais da Fazenda Boa Vista, desenvolvido como projeto acadêmico.

## Sobre o projeto

O sistema permite visualizar os produtos da fazenda, consultar detalhes, personalizar o café gourmet, adicionar produtos ao carrinho e finalizar pedidos.

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

## Como executar o projeto

1. Copie a pasta `fazenda-boa-vista` para o diretório `htdocs` do XAMPP.
2. Abra o painel de controle do XAMPP e inicie os serviços Apache e MySQL.
3. Acesse `http://localhost/phpmyadmin`.
4. Crie um banco de dados chamado `fazenda_boa_vista`.
5. Importe o arquivo `database/fazenda_boa_vista.sql`.
6. Confira as configurações de conexão no arquivo `config/conexao.php`.
7. Abra o navegador e acesse:

   `http://localhost/fazenda-boa-vista/`

## Banco de dados

O sistema utiliza MySQL. O arquivo SQL disponibilizado na pasta `database` contém a estrutura das tabelas e os dados necessários para iniciar o sistema.

## Execução local

O projeto foi desenvolvido para execução em ambiente local utilizando XAMPP, com Apache e MySQL.

## Projeto acadêmico

Fazenda Boa Vista — Sistema Web para Comercialização de Produtos Artesanais.