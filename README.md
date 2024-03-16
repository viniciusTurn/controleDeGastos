## Controle de Gastos

O Controle de Gastos é um aplicativo desenvolvido em Laravel para auxiliar no gerenciamento de itens, gastos e vendas. Ele permite que você cadastre itens, registre gastos associados a esses itens e acompanhe os ganhos com suas vendas.

## Funcionalidades

- Cadastro de itens: Adicione novos itens à sua lista.
- Registro de gastos: Registre os gastos associados a cada item.
- Registro de vendas: Acompanhe os ganhos com a venda dos itens.
- Visualização de dados: Utilize gráficos para visualizar os gastos e ganhos ao longo do tempo.

## Tecnologias Utilizadas

- Laravel: Framework PHP para o desenvolvimento da aplicação.
- MySQL: Banco de dados relacional para armazenar informações.
- Blade: Motor de template do Laravel para a construção das interfaces.
- JavaScript & jQuery: Para interatividade e manipulação do DOM.
- Chart.js: Biblioteca JavaScript para criação de gráficos interativos.
- Select2: Plugin jQuery para criar selects mais avançados e personalizados.

## Instalação

- Clone este repositório
- Instale as dependências do PHP: composer install
- Copie o arquivo de configuração de exemplo: cp .env.example .env
- Configure seu ambiente no arquivo .env, especialmente a conexão com o banco de dados.
- Execute as migrações do banco de dados: php artisan migrate
- Inicie o servidor: php artisan serve
- Acesse o aplicativo em seu navegador: http://localhost:8000

