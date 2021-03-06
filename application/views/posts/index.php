<?php $this->load->view('header') ?>
<div class="page-header">
    <div class="page-title">Posts</div>
    <a href="<?php echo base_url("posts/create") ?>" class="btn btn-primary d-block ml-auto">New Post</a>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <?php if ($this->session->flashdata('error')): ?>
                <?php echo bootstrap_alert($this->session->flashdata('error')) ?>
            <?php endif ?>
            <table class="table card-table table-striped table-vcenter">
                <thead>
                <tr>
                    <th>Title</th>
                    <th class="text-center">Published</th>
                    <th width="120">Created</th>
                    <th width="120">Updated</th>
                    <th width="150">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($posts = $blog->getPosts(false, false)): ?>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td>
                                <a href="<?php echo blog_url($blog, 'post/' . $post->getPostId()) ?>" target="_blank"><?php echo $post->getTitle() ?></a>
                            </td>
                            <td class="text-center"><?php echo $post->getDraft() == '1' ? "No" : "Yes" ?></td>
                            <td><?php echo date('M d, Y', strtotime($post->getCreated())) ?></td>
                            <td><?php echo date('M d, Y', strtotime($post->getModified())) ?></td>
                            <td>
                                <a href="<?php echo base_url("posts/edit/{$post->getPostId()}") ?>" class="btn btn-secondary btn-sm">Edit</a>
                                <form class="d-inline" action="<?php echo base_url("posts/delete/{$post->getPostId()}") ?>" method="post" accept-charset="utf-8"><input type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure you want to delete the post titled &quot;<?php echo $post->getTitle() ?>&quot;?')" value="Delete"></form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td class="text-muted py-5">You do not have any posts</td>
                    </tr>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('footer') ?>
