
<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
        <div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
<?php endif; ?>

<?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
    <?= Form::customLabel($name, $options['label'], $options['label_attr']) ?>
<?php endif; ?>

<div class="box">

    <?php if ($options['value']): ?>
        <?php foreach ($options['value'] as $file): ?>
        <div class="columns">
            <div class="column is-narrow">
                <img class="image is-thumb" src="<?= $file->getUrl('thumb') ?>" />
            </div>
            <div class="column">
                <h4 class="title is-6"><?= $file->name ?></h4>
                <p class="subtitle is-6">Type: <?= $file->mime_type ?> Size: <?= $file->human_readable_size ?></p>
            </div>
            <div class="column">
            <a href="" title="Delete file" class="button is-text is-pulled-right">
                <span class="icon is-small">
                <i class="mdi mdi-delete"></i>
                </span>
                <span>Delete</span></a>
            </div>
        </div>
        <hr>
        <?php endforeach ?>
    <?php endif; ?>

    <?php if ($showField): ?>

        <div class="file has-name is-fullwidth">
            <label class="file-label">
                <?= Form::input($type, $name, null, $options['attr']) ?>
                <span class="file-cta">
                    <span class="file-icon">
                    <i class="mdi mdi-upload"></i>
                    </span>
                    <span class="file-label">
                        Choose a file…
                    </span>
                </span>
                <span id="filename" class="file-name"></span>
            </label>
        </div>

        <?php include base_path().'/vendor/kris/laravel-form-builder/src/views/help_block.php' ?>
    <?php endif; ?>

    <?php include base_path().'/vendor/kris/laravel-form-builder/src/views/errors.php' ?>

</div>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
        </div>
    <?php endif; ?>
<?php endif; ?>


