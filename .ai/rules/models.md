---
paths:
    - 'app/Models/**'
---

# Models

## Laravel 13 Eloquent Attributes

Always use Laravel 13 attribute classes under `Illuminate\Database\Eloquent\Attributes\*` instead of declaring legacy model properties or overriding legacy method hooks:

- **Serialization & Visibility**: Use `#[Appends(['...'])]`, `#[Hidden(['...'])]`, and `#[Visible(['...'])]` instead of `$appends`, `$hidden`, and `$visible` properties.
- **Routing**: Use `#[RouteKey('column')]` instead of overriding `getRouteKeyName()`.
- **Database & Table Configuration**: Use `#[Table(...)]`, `#[WithoutIncrementing]`, `#[WithoutTimestamps]`, `#[Connection('...')]`, and `#[DateFormat('...')]` instead of `$table`, `$primaryKey`, `$incrementing`, `$timestamps`, `$connection`, or `$dateFormat` properties.
- **Events & Observers**: Use `#[ObservedBy(Observer::class)]` instead of registering model observers in service providers.
- **Query Scopes**: Annotate local query scopes with the `#[Scope]` attribute on `protected function` methods instead of prefixing method names with `scope`. Use `#[ScopedBy(GlobalScope::class)]` for global scopes instead of calling `addGlobalScope(...)`.
- **Relations & Refreshing**: Use `#[Touches(['relation'])]` and `#[Refreshes(['column'])]` instead of `$touches` and `$refreshes` properties.
- **Custom Classes & Builders**: Use `#[CollectedBy(CustomCollection::class)]`, `#[UseEloquentBuilder(CustomBuilder::class)]`, `#[UseFactory(CustomFactory::class)]`, and `#[UsePolicy(CustomPolicy::class)]` instead of overriding `newCollection()`, `newEloquentBuilder()`, or `newFactory()`.

## State Inspection Methods

Expose state inspection methods on models (e.g. `isSuperAdmin(): bool`, `isStandard(): bool`, `isPending(): bool`) to encapsulate domain state and proxy underlying enum checks so callers can use `$model->isState()` directly instead of reaching into properties like `$model->enum->isState()`. Avoid redundant aliases over raw boolean attributes where an attribute already clearly expresses the state (e.g. avoid creating an `isActive()` wrapper when `$model->is_active` already exists), and keep state methods pure and side-effect free.

## UUID Primary Keys and Global Unguarding

Use `HasUuids` on all domain models and pivot models defining a surrogate key. Do not declare `$fillable`, `$guarded`, or their attribute equivalents (`#[Fillable]`, `#[Guarded]`) because models are globally unguarded in `AppServiceProvider`.

## Docblock and Casts Ordering Following Migrations

List `@property` annotations in model docblocks in the exact column order defined in the table migration, followed by `@property-read` relationships. Explicitly define all migration columns in `casts()` in the identical migration column order, including primitive strings, and type dates in docblocks as `CarbonInterface` (or `CarbonInterface|null` if nullable).
