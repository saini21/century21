<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30"><?= __('Faqs') ?></h3>
<div class="faqs table-responsive g-mb-40">
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover u-table--v3 g-color-black">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('question') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($faqs as $faq): ?>
            <tr>
                <td><?= $this->Number->format($faq->id) ?></td>
                <td><?= h($faq->question) ?></td>
                <td><?= $faq->created->nice() ?></td>
                <td><?= $faq->modified->nice() ?></td>
                <?= $this->element('Admin/actions', ['id'=>$faq->id]) ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->element('Admin/pagination') ?>

