---
paths:
    - 'tests/**'
---

# Tests

## Unit and Feature Test Structure

Mirror each `app/` domain class under a matching folder in `tests/Unit/` (e.g. `tests/Unit/Models`, `tests/Unit/Actions`, `tests/Unit/Queries`, `tests/Unit/Policies`, `tests/Unit/Enums`, `tests/Unit/Listeners`, `tests/Unit/Middleware`, `tests/Unit/Notifications`) to test individual component logic and state directly. Place HTTP and integration tests in `tests/Feature/`—either directly in the root of `tests/Feature/` for broad user workflows (e.g. authentication, dashboard, registration) or organized in subfolders such as `tests/Feature/Controllers/` for controller-specific endpoint suites.

## Model Unit Test Assertions

In model unit tests, verify that `array_keys($model->toArray())` serializes attributes in the exact column order of the table migration, assert that sensitive attributes are excluded, and verify attribute casting.

## Pest Syntax and Global Database Refresh

Write tests using Pest's `test('description', function () { ... })` syntax, never `it()` or PHPUnit classes. Do not use `RefreshDatabase` or `LazilyRefreshDatabase` inside test files because database refresh is configured globally in `tests/Pest.php`.
