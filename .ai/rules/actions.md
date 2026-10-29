---
paths:
    - 'app/Actions/**'
---

# Actions

## Single-Purpose Domain and Workflow Executors

Actions are single-purpose executors responsible for distinct business operations, including complex domain logic, calculations, data processing, multi-step workflows, or database mutations. Enforce preconditions and authorization at the HTTP boundary (via Policies and FormRequests), not inside actions.

## Atomic Database Transactions

When an action executes multiple database writes or model updates, wrap them in `DB::transaction(...)` to ensure atomic completion. Do not wrap single queries or read-only calculations.

## Sensitive Parameter Protection

Annotate password and secret arguments in action methods with PHP's `#[SensitiveParameter]` attribute.
