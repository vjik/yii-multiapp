<?php

declare(strict_types=1);

use Yiisoft\Html\Html;

/**
 * @var Yiisoft\View\WebView $this
 * @var Common\CommonParameters $commonParameters
 * @var AppMain\ApplicationParameters $applicationParameters
 * @var string|null $csrf
 */
?>
<head>
    <meta charset="<?= Html::encode($applicationParameters->getCharset()) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($csrf !== null) { ?>
        <meta name="csrf" content="<?= $csrf ?>">
    <?php } ?>
    <?php if ($this->getTitle() !== null) { ?>
        <title><?= Html::encode($this->getTitle()) ?></title>
    <?php } ?>
    <?php $this->head() ?>
</head>
