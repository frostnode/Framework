
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

        <?php if (count($options['value']) != 1) : ?>

                <?php foreach ($options['value'] as $file): ?>
                <div class="columns">
                    <div class="column is-2">
                        <img class="image is-thumb" src="<?= $file->getUrl('thumb') ?>" />
                    </div>
                    <div class="column">
                        <?= $file->name ?>
                    </div>
                    <div class="column">
                        (<?= $file->mime_type ?> <?= $file->human_readable_size ?>)
                    </div>
                    <div class="column">
                    <a href="" title="Delete file" class="button is-link is-small is-pulled-right">
                        <span class="icon is-small">
                            <span data-glyph="trash" class="oi"></span>
                        </span>
                        <span>Delete</span></a>
                    </div>
                </div>
                <hr>
                <?php endforeach ?>

        <?php else: ?>
            <img class="image is-8by5" src="<?= $options['value'] ?>" />
        <?php endif; ?>

    <?php endif; ?>

    <?php if ($showField): ?>

        <div class="file has-name is-fullwidth">
            <label class="file-label">
                <?= Form::input($type, $name, null, $options['attr']) ?>
                <span class="file-cta">
                    <span class="file-icon">
                        <span class="oi" data-glyph="cloud-upload"></span>
                    </span>
                    <span class="file-label">
                        Choose a file…
                    </span>
                </span>
                <span class="file-name"></span>
            </label>
        </div>

        <?php //include base_path().'help_block.php' ?>
    <?php endif; ?>

    <?php //include 'errors.php' ?>

</div>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
        </div>
    <?php endif; ?>
<?php endif; ?>


