---
paths:
    - 'database/migrations/**'
---

# Migrations

## UUID Keys and Timezone Timestamps

Use `$table->uuid('id')->primary()` for all application table primary keys—including pivot and join tables—and `$table->foreignUuidFor(Model::class)` for foreign keys, leaving default Laravel framework tables as provided. Store enums as `string()` columns (with indexes if frequently queried), use timezone-aware timestamps (`$table->timestampsTz()`, `$table->softDeletesTz()`), and omit `down()` methods.

## Dedicated Domain Timestamps

Do not rely on `created_at` or `updated_at` to represent domain milestones or business state transitions (e.g. published, verified, completed, archived). Define dedicated timezone-aware timestamps (`timestampTz()`), marking them `nullable()` only when representing deferred or optional lifecycle milestones, and non-nullable when required at record creation (e.g. `ordered_at`, `occurred_at`, `starts_at`). Retain standard `$table->timestampsTz()` on all tables—including append-only or audit logs—so matching `created_at` and `updated_at` can verify the record has remained unmutated.
