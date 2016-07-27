<h1>Postss List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Text</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($postss as $posts): ?>
    <tr>
      <td><a href="<?php echo url_for('Post/edit?id='.$posts->getId()) ?>"><?php echo $posts->getId() ?></a></td>
      <td><?php echo $posts->getText() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('Post/new') ?>">New</a>
