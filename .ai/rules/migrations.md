---
paths:
    - 'database/migrations/**'
---

# Migrations

## UUID Keys and Timezone Timestamps

Use `$table->uuid('id')->primary()` for all application table primary keys—including pivot and join tables—and `$table->foreignUuidFor(Model::class)` for foreign keys, leaving default Laravel framework tables as provided. Store enums as `string()` columns (with indexes if frequently queried), use timezone-aware timestamps (`$table->timestampsTz()`, `$table->softDeletesTz()`), and omit `down()` methods.
