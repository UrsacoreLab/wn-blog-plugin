<?php
Block::put('breadcrumb') ?>
<ul>
    <li><a href="<?= Backend::url('UrsacoreLab/Blog/CategoryController') ?>"><?= e(trans('ursacorelab.blog::lang.controller.category.label')); ?></a></li>
    <li><?= e($this->pageTitle) ?></li>
</ul>
<?php
Block::endPut() ?>

<?php
if (! $this->fatalError): ?>

    <?= Form::open(['class' => 'layout']) ?>

    <div class="layout-row">
        <?= $this->formRender() ?>
    </div>

    <div class="form-buttons">
        <div class="loading-indicator-container">
            <button
                type="button"
                data-request="onSave"
                data-hotkey="ctrl+s, cmd+s"
                data-load-indicator="<?= e(trans('ursacorelab.blog::lang.controller.category.saving')); ?>"
                class="btn btn-primary">
                <?= e(trans('backend::lang.form.create')); ?>
            </button>
            <button
                type="button"
                data-request="onSave"
                data-request-data="close:1"
                data-hotkey="ctrl+enter, cmd+enter"
                data-load-indicator="<?= e(trans('ursacorelab.blog::lang.controller.category.saving')); ?>"
                class="btn btn-default">
                <?= e(trans('backend::lang.form.create_and_close')); ?>
            </button>
            <span class="btn-text">
                    or <a href="<?= Backend::url('UrsacoreLab/Blog/CategoryController') ?>"><?= e(trans('backend::lang.form.cancel')); ?></a>
                </span>
        </div>
    </div>

    <?= Form::close() ?>

<?php
else: ?>

    <p class="flash-message static error"><?= e($this->fatalError) ?></p>
    <p><a href="<?= Backend::url('UrsacoreLab/Blog/CategoryController') ?>" class="btn btn-default"><?= e(trans('backend::lang.form.return_to_list')); ?></a></p>

<?php
endif ?>
