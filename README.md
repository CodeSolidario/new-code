# Projeto Code Solidário

<p>Este é um projeto de uma plataforma online para compartilhamento e colaboração em projetos open source que ajusem a resolver problemas sociais.</p>

---

<h2>Tecnologias </h2>
    
![laravel-vue-docker](https://user-images.githubusercontent.com/32945891/80235462-21181500-8630-11ea-874c-331b519698b4.png)

## Começando

### Crie um FORK do projeto

Vá para o repositório e clique no botão "Fork", isso irá criar uma cópia do projeto original para o seu repositório no GitHub.

### Clone o projeto forkado para sua máquina.

```
git clone git@github.com:SEUUSUARIO/NOMEREPOSITORIO.git
```

### Carregue o repositório origem do projeto

Para manter seu projeto atualizado é necessário configurar um branch "upstream" com o repositório origem.

```
git remote add upstream git@github.com:CodeSolidario/new-code.git
git fetch upstream
```

Origin: Será o seu repositório forkado
Upstream: Será o repositório original dentro do Code Solidário.

### Atualize seu fork

```
git checkout master
git fetch upstream
git merge upstream/master
git push origin master

git checkout develop
git fetch upstream
git merge upstream/develop
git push origin develop
```

### Configuração do projeto

    Crie um arquivo .env e cole nele o conteúdo que está em .env.example.
    cd NOMEDOPROKETO

```
docker-compose up -d
```

    Configure a API

```
docker-compose exec api bash
composer install
php artisan key:generate
php artisan migrate
exit
```

Acesse a página do frontend em: http://localhost:8080
Acesse a página da api em: http://localhost:8000
Caso a página da api apresente erro de permissão de acesso esecute:

```
    docker-compose exec api chmod -R 777 /var/www/storage
```

### Contribuindo com o projeto

Realize as alterações necessárias, certifique-se de estar trabalhando na branch develop.
Após finalizar as alterações suba para o seu repositório.

```
git add .

git commit -m "[CODIGODATAREFA] SEU COMENTÁRIO"
```

Caso algo esteja errado você pode fazer o reset

```
git reset --hard HEAD~1
```

Faça um push para a branch develop do seu repositório

```
git push origin develop
```

### Solicite um PULL REQUEST

Suas alterações serão enviadas para avaliação do responsável pelo repositório, testadas e caso esteja tudo certo, serão aprovadas e incluídas no projeto.

## Mantenha seu repositório sincronizado com o do original

Sempre repita os comandos de atualização do fork antes de começar a trabalhar em uma nova atualização.

## Criando Tarefas

- Caso localize algum bug ou melhoria a ser feita no projeto abra uma nova issue seguindo a nomenclatura "TF000" para o frontend ou "TB000" para o backend, sendo que o número deve ser sempre o próximo após a última issue cadastrada.
- Na aba de issues, na barra lateral, em "Projects", selecionar o projeto.
- Descreva a melhoria ou correção que deve ser feita.
  As issues criadas vinculadas ao projeto se tornam cards de atividade na aba Projects do repositório.
