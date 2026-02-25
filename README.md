🚀 OrbitPM

SaaS Multiempresa de Gestão de Projetos
API REST construída com Laravel + PostgreSQL

📌 Sobre o Projeto

OrbitPM é uma aplicação SaaS multiempresa para gestão de projetos e tarefas.

O sistema foi desenvolvido com foco em:

Arquitetura limpa

API REST escalável

Isolamento multiempresa

Boas práticas de engenharia

Deploy em produção com PostgreSQL

Este projeto faz parte de um treinamento intensivo de engenharia backend utilizando Laravel.

🏗️ Arquitetura

O sistema segue o padrão:

Controller
→ Service
→ Repository
→ Model (Eloquent ORM)
→ PostgreSQL

Características:

Monólito modular

API-first

Multi-tenant simples (por company_id)

Role-based access control

Validação com FormRequest

Middleware para escopo de empresa

🛠️ Tecnologias Utilizadas

PHP 8+

Laravel 10+

PostgreSQL

Laravel Sanctum (Autenticação)

Eloquent ORM

Composer

Git

🔐 Funcionalidades
✅ Autenticação

Registro

Login

Logout

Proteção de rotas com token

✅ Multiempresa

Cada usuário pertence a uma empresa

Dados isolados por company_id

✅ Gestão de Usuários

Papéis:

Admin

Manager

Member

Controle de permissões

✅ Projetos

Criar projeto

Listar projetos

Atualizar projeto

Remover projeto

✅ Tarefas

Criar tarefas

Atribuir a usuário

Status:

todo

doing

done

Prioridade

Filtro por status

Paginação

🗄️ Modelagem Inicial

Entidades principais:

companies

users

projects

tasks

Relacionamentos:

Company 1:N Users

Company 1:N Projects

Project 1:N Tasks

User N:N Projects (pivot: project_user)

Task N:1 User (assigned_to)