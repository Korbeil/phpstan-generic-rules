# phpstan-generic-rules


## Installation

We assume that [PHPStan](https://github.com/phpstan/phpstan) is already installed in your project.

To use this extension, require it in [Composer](https://getcomposer.org/):

```bash
composer require --dev Korbeil/phpstan-generic-rules
```

If you also install [phpstan/extension-installer](https://github.com/phpstan/extension-installer) then you're all set!

<details>
  <summary>Manual installation</summary>

If you don't want to use `phpstan/extension-installer`, include phpstan-strict-rules.neon in your project's PHPStan config:

```yml
includes:
    - vendor/Korbeil/phpstan-generic-rules/extension.neon
```
</details>
