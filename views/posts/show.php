
<table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Post</td>
            <td><?php echo $post->id; ?></td>
        </tr>
        <tr>
            <td>Autor</td>
            <td><?php echo $post->author; ?></td>
        </tr>
        <tr>
            <td>Contingut</td>
            <td><?php echo $post->content; ?></td>
        </tr>
        <tr>
            <td>Tematica</td>
            <td><?php echo Tematica::find($post->tematica)->nom; ?></td>
        </tr>
 </table>