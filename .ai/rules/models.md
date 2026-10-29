---
paths:
    - 'app/Models/**'
---

# Models

## State Inspection Methods

Define model state inspection methods only for composite or computed domain states (e.g. `isPending(): bool`, `isSuperAdmin(): bool`). Avoid trivial wrappers over cast boolean attributes, and keep state methods pure and side-effect free.

## UUID Primary Keys and Global Unguarding

Use `HasUuids` on all domain models and pivot models defining a surrogate key. Do not declare `$fillable`, `$guarded`, or their attribute equivalents (`#[Fillable]`, `#[Guarded]`) because models are globally unguarded in `AppServiceProvider`.

## Docblock and Casts Ordering Following Migrations

List `@property` annotations in model docblocks in the exact column order defined in the table migration, followed by `@property-read` relationships. Explicitly define all migration columns in `casts()` in the identical migration column order, including primitive strings, and type dates in docblocks as `CarbonInterface` (or `CarbonInterface|null` if nullable).

## Query Scopes

Annotate local query scopes with the `#[Scope]` attribute on `protected function` methods.
