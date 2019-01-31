<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">

	<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
	<section class="section">
		<div class="container">
			<h1 class="title">
				Laravel Snapmail
			</h1>
			<p class="subtitle">
				My first website with <strong>Bulma</strong>!
			</p>
			<article class="message">
				<div class="message-header">
					<p>Expéditeur : {{ $email }}</p>
				</div>
				<div class="message-body">
					{!! $content !!}
				</div>
			</article>
		</div>
	</section>
	<footer class="footer" style="position: absolute; bottom: 0; width: 100%;">
		<div class="content has-text-centered">
			<p>
				Developed by <strong>Yoann Di Maria</strong>, powered by <a href="https://laravel.com/">Laravel</a> and <a href="https://bulma.io/">Bulma</a>
			</p>
		</div>
	</footer>
</body>
</html>