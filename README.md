# phpstan-generic-rules

## Rules list

### Debug rules

- You should not have `var_dump`, `exit` or `die` function calls
- If you have `symfony/var-dumper`, you should not have `dump` or `die` function calls

### MbString rules

- You should use multibyte string function when it exists

## Installation

We assume that [PHPStan](https://github.com/phpstan/phpstan) is already installed in your project.

To use this extension, require it in [Composer](https://getcomposer.org/):

```bash
composer require --dev korbeil/phpstan-generic-rules
```

If you also install [phpstan/extension-installer](https://github.com/phpstan/extension-installer) then you're all set!

<details>
  <summary>Manual installation</summary>

If you don't want to use `phpstan/extension-installer`, include phpstan-strict-rules.neon in your project's PHPStan config:

```yml
includes:
    - vendor/korbeil/phpstan-generic-rules/extension.neon
```
</details>

## Advanced usage

You can configure this library with parameters:

```
parameters:
    generic_rules:
        mb_string_rules: false  # To disable the mb_string rule
```
