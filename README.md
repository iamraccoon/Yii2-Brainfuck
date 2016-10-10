Yii2Brainfuck
======================
Convert your message to brainfuck code

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```sh
composer require iamraccoon/brainfuck
```

or add

```json
"iamraccoon/brainfuck": "dev-master"
```

to the require section of your `composer.json` file.


Basic configuration:
```
    'components' => [
        'brainfuck' => [
            'class' => '\iamraccoon\brainfuck\BrainFuck',
        ]
    ]
```


Some examples:

  ```php
  $brainFuck = Yii::$app->brainfuck;
  echo $brainFuck->build('fuck');
  ```