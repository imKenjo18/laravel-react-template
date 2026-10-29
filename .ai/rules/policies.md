---
paths:
    - 'app/Policies/**'
---

# Policies

## Pure Authorization Evaluation

Evaluate user authorization and domain resource state purely in Policy methods without side effects or mutations. Authorization failures reject requests at the gate before reaching the controller or action.
