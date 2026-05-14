🖥️ Front-end (SPA Architecture)

O Front-end foi construído com foco em performance e modularidade, utilizando Materialize CSS para UI e jQuery para manipulação do DOM.

Atribuições do Front:
Roteamento Dinâmico (Router.js): Gerencia a navegação via hashchange sem recarregar o browser. Injeta dinamicamente o HTML, CSS e o JS específico de cada página.

Injeção de Dependências (Lazy Loading): Os scripts de páginas (assets/js/pages/) só são carregados quando o usuário acessa a respectiva rota, otimizando o carregamento inicial.

Consumo de API (Services.js): Interface centralizada para todas as requisições AJAX, garantindo padrões de cabeçalho e tratamento de erros.

Renderização por Módulo (Page Scripts): Cada página (ex: home.js) é responsável por buscar seus dados e renderizar seu próprio HTML, evitando que o main.js se torne um arquivo centralizado e difícil de manter.

---

⚙️ Back-end (Clean Core API)

O Back-end segue princípios de SoC (Separation of Concerns), utilizando PHP moderno com Composer e PSR-4 para autoloading.

Atribuições do Back:
Core: Gerencia a conexão com o banco de dados (Singleton) e o carregamento de variáveis de ambiente (phpdotenv).

Controllers: Recebem a requisição do roteador, validam entradas básicas e entregam a resposta em formato JSON.

Services (Camada de Inteligência): Onde reside a lógica de negócio. Trata as regras do SaaS antes de enviar para o Front ou salvar no Banco.

Models: Camada de persistência que executa SQL puro (via PDO) para máxima performance e controle sobre os dados.

Segurança: O arquivo .htaccess protege diretórios sensíveis e redireciona todas as requisições para o index.php, permitindo URLs limpas.

---

🛠️ Tecnologias Utilizadas

Front-end: jQuery, Materialize CSS, Google Material Icons.

Back-end: PHP 8+, Composer, phpdotenv.

Infra: Apache (mod_rewrite), MySQL.

---

🛠️ Instalação e Configuração

Clone o repositório.

Na pasta /api, execute composer install.

Crie o arquivo /api/.env baseado no /api/.env.example.

Configure seu VirtualHost para apontar para a raiz do projeto e certifique-se de que o AllowOverride All esteja habilitado no Apache.

---

Projeto desenvolvido com foco em escalabilidade e manutenção simplificada.
