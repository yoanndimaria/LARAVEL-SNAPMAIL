<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Snapmail</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">

	<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.22/vue.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
	<style>
		.progress::-webkit-progress-value {
			transition: width 1s ease;
		}
	</style>
</head>
<body>
	<section class="section" id="vue-engine">
		<div class="container">
			<h1 class="title">
				Laravel Snapmail
			</h1>
			<p class="subtitle">
				My first website with <strong>Bulma</strong>!
			</p>
			<div class="columns desktop">
				<div class="column">
					<div class="box">
						{{ csrf_field() }}
						<div class="field">
							<p class="control is-expanded has-icons-left has-icons-right">
								<input class="input" v-model="email" type="email" placeholder="Votre adresse email">
								<span class="icon is-small is-left">
									<i class="fas fa-envelope"></i>
								</span>
								<span class="icon is-small is-right">
									<!-- <i class="fas fa-check"></i> -->
								</span>
							</p>
						</div>

						<div class="field">
							<label class="label">Message</label>
							<div class="control">
								<textarea class="textarea" v-model="message"></textarea>
							</div>
						</div>

						<div class="field is-grouped">
							<div class="control">
								<button class="button is-link" v-on:click="send">Envoyer le message</button>
							</div>
						</div>
						<progress class="progress is-small" v-bind:class="progress.status" v-bind:value="progress.value" value="0" max="100"></progress>
					</div>

					<div v-if="notification.open" class="notification" v-bind:class="notification.type">
						<button class="delete" v-on:click="close"></button>
						<p>${ notification.content }</p>
					</div>
				</div>
				<div class="column">
					<p>Un courrier électronique, e-mail, mail ou courriel est un message écrit envoyé électroniquement via un réseau informatique. On appelle messagerie électronique l'ensemble du système qui permet la transmission des courriers électroniques. Elle respecte des règles normalisées afin d'autoriser le dépôt de courriels dans la boîte aux lettres électronique d’un destinataire choisi par l’émetteur.

						Pour émettre ou recevoir des messages par courrier électronique, il faut disposer d’une adresse électronique et d'un client de messagerie (ou d’une messagerie web permettant l'accès aux messages via un navigateur web).

						L’acheminement des courriels, qui peuvent contenir des documents, est régi par diverses normes concernant aussi bien le routage que le contenu. Toutefois, comme le destinataire ne reçoit pas une copie conforme de l’écran de l’expéditeur, il est d'usage de respecter certaines règles implicites lors de l’envoi. De même, la connaissance de certains aspects techniques permet d’éviter des erreurs de compréhension ou de communication.

						En France, malgré les difficultés liées à son caractère souvent non explicite (patronyme absent), l'adresse électronique tend à être reconnue comme moyen valide de contacter une personne. En matière de droit des obligations, selon le code civil français « l'écrit sur support électronique a la même force probante que l'écrit sur support papier »2. L'écrit électronique est de plus reconnu par le code civil comme valide à titre de preuve afin de conclure un contrat3. En matière de droit social, est reconnu pour le salarié le « droit, même au temps et au lieu de travail, au respect de l'intimité de sa vie privée »4, ce droit impliquant « en particulier le secret des correspondances »4.

					Par leur contenu et leur forme, les messages envoyés par courrier électronique donnent à leurs destinataires une image de l'expéditeur. Le rôle du courrier électronique est croissant dans le maintien des liens sociaux, surtout en cas d'éloignement géographique.</p>
				</div>
			</div>
		</div>
	</section>

	<script src="/js/script.js"></script>
</body>
</html>