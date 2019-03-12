<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30"><?= $faq->question ?></h3>


<div class="faqs view large-9 medium-8 columns content">
    <div class="row">
        <div class="col-lg-12">
            <label style="float: left; margin-right: 10px; font-weight: bold"><?= __('Question') ?>: </label>
            <p><?= h($faq->question); ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <label style="font-weight: bold"><?= __('Answer') ?>: </label>
        
        <?= $this->Text->autoParagraph(h($faq->answer)); ?>
        </div>
    </div>
    
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($faq->created->nice()) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($faq->modified->nice()) ?></td>
        </tr>
    </table>
</div>
