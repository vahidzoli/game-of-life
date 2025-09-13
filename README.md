# game-of-life

This is a simple implementation of **Game of Life** written in PHP.  
It demonstrates the evolution of a **Glider** pattern inside a 25x25 grid.

---

## Requirements
- PHP 8+
- [Composer](https://getcomposer.org/) (for PHPUnit)

---

## Running the Game
Save the main script as `GameLife.php` and run:

```bash
php GameLife.php

## CLI Options

You can customize the simulation from the command line:

```bash
php GameLife.php --rows=30 --cols=30 --gens=20
