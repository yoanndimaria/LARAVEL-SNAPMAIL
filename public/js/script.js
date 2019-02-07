const requests = axios.create({
	baseURL: window.location.href,
})

new Vue({
	delimiters: ['${', '}'],
	el: '#vue-engine',
	data: {
		email: 'dm.yoann@gmail.com',
		message: 'BONJOUR',
		progress: {
			value: 0,
			status: 'is-success'
		},
		notification: {
			open: false,
			type: '',
			content: ''
		}
	},
	methods: {
		close: function() {
			this.notification.open = false
			this.notification.type = ""
			this.notification.content = ""
			this.progress.value = 0
		},
		send: function() {
			this.close()

			t = this
			t.progress.value = 0
			t.progress.value = 25
			t.progress.status = "is-success"
			requests.post('/create', {
				'email': this.email,
				'message': this.message,
			}).then(function(response) {
				t.progress.value = 50
				response = response.data

				if(response) {
					t.progress.value = 75
					switch (response.status.code) {
						case 'OK':
							t.notification.open = true
							t.notification.type = "is-success"
							t.notification.content = response.content

							t.email = ''
							t.message = ''
							t.progress.value = 100
						break;
						case 'KO-EMPTY-FIELDS':
							t.progress.value = 100
							t.progress.status = "is-danger"
							t.notification.open = true
							t.notification.type = "is-danger"
							t.notification.content = response.content
						break;
						case 'KO-EMAIL':
							t.progress.value = 100
							t.progress.status = "is-danger"
							t.notification.open = true
							t.notification.type = "is-danger"
							t.notification.content = response.content
						break;
						default:
						console.log('Sorry, we are out of ' + expr + '.');
					}
				}
			}).catch(function(error) {
				t.progress.value = 100
				t.progress.status = "is-danger"

				t.notification.open = true
				t.notification.type = "is-danger"
				t.notification.content = "Une erreur est survenue avec le serveur !"
			})
		},
	}
})
