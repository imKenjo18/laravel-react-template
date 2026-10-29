---
paths:
    - 'app/**'
---

# App

## Empty Method and Constructor Formatting

Empty methods and constructors (e.g. constructors with property promotion only, or empty interface/stub implementations) must have a single `//` comment in the body on a newline.

Single-line constructor arguments (when they fit within standard line length, even with multiple dependencies):

```php
public function __construct(private SomeService $service, private OtherService $otherService)
{
    //
}
```

Multiline constructor arguments (when the parameter list exceeds line length):

```php
public function __construct(
    private SomeLongService $service,
    private AnotherLongService $otherService,
) {
    //
}
```

Do not use `) {}` or empty braces without a comment.
