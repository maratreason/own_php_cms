<?php $this->theme->header(); ?>

<main>
    <div class="container">
        <a href="/admin/posts/create/">Create Post</a>
        <h3>Posts</h3>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($posts as $post) {?>
                    <tr>
                        <th scope="row"><?=$post->id?></th>
                        <td><a href="/admin/posts/edit/<?=$post->id?>"><?=$post->title?></a></td>
                        <td><?=$post->date?></td>
                    </tr>
                <?}?>
            </tbody>
        </table>
    </div>
</main>

<?php $this->theme->footer(); ?>