<?php $this->load->view('header') ?>
<div class="page-header">
    <div class="page-title">New Page</div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <?php if (!empty($error)): ?>
                    <?php echo bootstrap_alert($error) ?>
                <?php endif ?>

                <?php echo form_open("pages/create") ?>
                <div class="form-group">
                    <?php echo bootstrap_input('title', 'Page Title') ?>
                </div>
                <div class="form-group">
                    <?php echo wsywig('body', 'Page Body') ?>
                </div>
                <input type="submit" name="publish" value="Publish" class="btn btn-primary">
                <input type="submit" name="draft" value="Save as Draft" class="btn btn-outline-primary">
                <a href="<?php echo base_url('pages') ?>" class="btn btn-link">Cancel</a>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer') ?>
