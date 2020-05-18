# Projeto Code Solidário

<p>Este é um projeto de uma plataforma online onde desenvolvedores podem divulgar suas ideias de projetos de interesse social e outros desenvolvedores podem colaborar com eles.</p>

---

<h2>Tecnologias </h2>
    
![laravel-vue-docker](https://user-images.githubusercontent.com/32945891/80235462-21181500-8630-11ea-874c-331b519698b4.png)

### Começando

#### Download do projeto

```
    - Faça o fork do projeto
    - Clone o projeto forkado para sua maquina: git clone git@github.com:seuusuario/new-code.git

```

#### Configuração do .env

    Crie um arquivo .env e cole nele o conteúdo que está em .env.example.

### Subindo o container docker

    cd new-code
    docker-compose up -d

### Configurando a api

    docker-compose exec api bash
    composer install
    php artisan key:generate
    php artisan migrate
    exit

    Acesse a página do frontend em: http://localhost:8081
    Acesse a página da api em: http://localhost:8001
    *caso a página da api apresente erro de permissão de acesso esecute:
        docker-compose exec api chmod -R 777 /var/www/storage

## Colaborando com o projeto

### Tarefas

As tarefas estão disponíveis na aba Projects do repositório.

### Trabalhando em tarefas

    - Crie uma nova branch local com o nome da tarefa escolhida.
    - Realize as alterações necessárias.
    - Suba a branch alterada para o seu repositório forkado.
    - Faça um pull request.

    Após analisar as alterações de tudo estiver funcionando o pull request será aceito.

    * Ao escolher uma tarefa não esqueça de mudar para "In progress" na aba Projects.

### Atualizando seu projeto local com o original

### Criando tarefas

    - Caso localize algum bug ou melhoria a ser feita no projeto abra uma nova issue seguindo a nomenclatura "TF000" para o frontend ou "TB000" para o backend, sendo que o número deve ser sempre o próximo após a última issue cadastrada.
    - Na aba de issues, na barra lateral, em "Projects", selecionar o projeto Code Solidário.
    - Descreva a melhoria ou correção que deve ser feita.
