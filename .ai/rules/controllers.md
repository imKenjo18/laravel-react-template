---
paths:
    - 'app/Http/Controllers/**'
---

# Controllers

## Thin Dispatchers Delegating to Actions and Queries

Controllers contain no business domain logic, manual transactions, or direct write queries. Encapsulate all database writes in Action classes (`app/Actions/`) and complex read queries in Query classes (`app/Queries/`).

## Route Authorization Priority

Prioritize authorization in dedicated FormRequest classes via `authorize()`. Reserve the `#[Authorize]` controller method attribute exclusively for endpoints without a dedicated FormRequest (such as `index`, `show`, `destroy`, or methods accepting generic `Request $request`).

## Authenticated User Retrieval

Inject the authenticated user using Laravel's `#[CurrentUser] User $user` parameter attribute instead of calling `$request->user()`.
