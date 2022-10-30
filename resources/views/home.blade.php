<h1><?php echo $name ?></h1>
<h3><?php echo $age ?></h3>

<hr>

<?php foreach($posts as $post): ?>
<h4><?php echo $post['id'] . ' - ' . $post['title'] ?></h4>
<p><?php echo $post['content'] ?></p>
<?php endforeach; ?>

<hr>
<hr>

<h1>{{ $name }}</h1>
<h3>{{ $age }}</h3>

<hr>

@foreach($posts as $post)
<h4>{{ $post['id'] . ' - ' . $post['title'] }}</h4>
<p>{{ $post['content'] }}</p>
@endforeach
