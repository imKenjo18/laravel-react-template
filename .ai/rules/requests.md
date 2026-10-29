---
paths:
    - 'app/Http/Requests/**'
---

# Form Requests

## Input Validation and Route Authorization

Prioritize route authorization inside `authorize()` with `$this->user()->can(...)`, and use `rules()` strictly for syntactic input validation. Do not invoke Action classes, perform database mutations, or dispatch domain events inside FormRequests.

## Validation Queries and Read Checks

Read-only queries and model inspections are permitted and expected within FormRequests (e.g. inside `after()` callbacks or validation rules) to verify state constraints, check existence, or validate business preconditions.

## Authenticated User and Route Parameters

Use `$this->user()` to access the authenticated user in FormRequests. Access route models via `#[RouteParameter] ModelName $modelName` with strongly typed models.

## Pre- and Post-Validation Lifecycle Hooks

Use `prepareForValidation()` to sanitize or normalize input before validation rules execute. Return callable closures from an `after(): array` method for stateful or multi-field checks after standard validation passes.

## Reusable Validation Concerns

Import and compose reusable validation rule sets using traits located under `app/Concerns/`.
