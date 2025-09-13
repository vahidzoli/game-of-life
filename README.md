# game-of-life

This is a simple implementation of **Game of Life** written in PHP.  
It demonstrates the evolution of a **Glider** pattern inside a 25x25 grid.

---

## Requirements
- PHP 8+
- [Composer](https://getcomposer.org/) (for PHPUnit)

---

## Installation

1. Clone the repository:

```bash
git clone https://github.com/vahidzoli/game-of-life.git
```

---

2. Install dependencies (for PHPUnit):

```bash
composer install
```

---

## Running the Game
Save the project and run:

```bash
php demo.php
```

---

## Running Tests

The project includes PHPUnit tests in testGameLifeInfiniteTest.php.

```bash
vendor/bin/phpunit
```

---

You should see output similar to:

```bash
PHPUnit 10.0.0 by Sebastian Bergmann and contributors.

....                                                                4 / 4 (100%)

Time: 00:00.012, Memory: 6.00 MB

OK (4 tests, 10 assertions)
```
