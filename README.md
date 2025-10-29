# Design Patterns in PHP

A practical collection of **Design Patterns implemented in PHP** following clean architecture and SOLID principles.

---

## Design Patterns Overview

### The design patterns are divided into three groups:

#### 1. **Creational Patterns**

* Concern the process of **object creation**.
* **Goal:** A program should not depend on how objects are created or composed.
* **Key Idea:** Abstract the instantiation process - creation logic is hidden through encapsulation.
* Developers can use a method or an object instead of directly using `new`.

#### 2. **Structural Patterns**

* Deal with the **composition of classes and objects**.
* Describe **how to assemble objects** into larger structures using **inheritance** and **composition**.

#### 3. **Behavioral Patterns**

* Concerned with **communication between objects**.
* Focus on **algorithms** and **the assignment of responsibilities** between objects.

---

### Design Patterns Scope

Patterns can also be classified by **scope**:

* **Class Pattern:** Applies to class relationships (handled through inheritance).
* **Object Pattern:** Applies to object relationships (handled through composition).

---

## How to Use

```bash
# 1- Clone the repository
git clone [https://github.com/aliahmed204/design-patterns-php.git]
cd design-patterns-php

# 2️- Install dependencies
composer install

# 3️- Run all tests
vendor/bin/phpunit
```

---

## Project Structure (Short Overview)

```
src/
 └── Creational/
     └── PatternName/
         └── PatternName.php

tests/
 └── Unit/
     └── PatternName/
         └── PatternNameTest.php
```

Each pattern includes:

1 - **Implementation** (under `src/`)
2 - **Unit Test** (under `tests/`)

---

## Requirements

* PHP >= 8.1
* Composer
* PHPUnit

---

## 👨‍💻 Author

**Ali Ahmed**
* [LinkedIn]: (https://www.linkedin.com/in/aliahmed-/)
