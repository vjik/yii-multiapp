<?php

declare(strict_types=1);

use Yiisoft\Html\Html;

/**
 * @var Yiisoft\View\WebView $this
 * @var Common\CommonParameters $commonParameters
 * @var AppAdmin\ApplicationParameters $applicationParameters
 * @var string|null $csrf
 * @var string $content
 */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Html::encode($applicationParameters->getLanguage()) ?>">
<?= $this->render('_head') ?>
<?php $this->beginBody() ?>
<body>
<?= $content ?>
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
