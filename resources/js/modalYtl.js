const YTPlayer = require('yt-player')

class modalVideo extends HTMLElement {
	constructor() {
		super();

		// this.attachShadow({ mode: 'open' });
	}

	connectedCallback() {
		// this.shadowRoot.appendChild(this.templateContent().content.cloneNode(true));
		this.appendChild(this.templateContent().content)
		this.addEventListener('modal.ytl.show', (e)=>{
			this.querySelector('.modal-ytl').setAttribute('aria-hidden', false)
		})

		this.addEventListener('modal.ytl.hide', (e)=>{
			this.querySelector('.modal-ytl').setAttribute('aria-hidden', true)
			this.player.pause()
		})
		this.querySelector('.modal-close-ytl svg').addEventListener('click', (e)=>{
			console.log('close');
			this.hideModal()
		})

		// this.videoID = this.getAttribute('video-id')
		// this.shadowRoot.querySelector('#toggle-info').addEventListener('click', () => this.toggleInfo());
	}


	static get observedAttributes() {
		return [ 'video-id' ];
	}

	attributeChangedCallback(name, oldVal, newVal) {

		switch(name) {
			case 'video-id':
				this.videoID = newVal
				if(oldVal != newVal){
					const videoWrapper = this.querySelector('#videoWrapper');
					videoWrapper.innerHTML = ''
				}
				this.triggerYtlVideo()
				
			break
		}
	}


	disconnectedCallback() {
		this.removeEventListener('modal.ytl.show')
		this.removeEventListener('modal.ytl.hide')
	}

	templateContent(){
		const template =  document.querySelector('#modal-ytl-template');
		return template
	}

	showModal(){
		console.log('show');
		const event = new Event('modal.ytl.show')
		this.dispatchEvent(event);
	}

	hideModal(){
		const event = new Event('modal.ytl.hide')
		this.dispatchEvent(event);
		
	}

	triggerYtlVideo(){
		const videoWrapper = this.querySelector('#videoWrapper');
		let player = document.createElement('div')
		player.id = "player"
		videoWrapper.append(player)
		this.player = new YTPlayer('#player')
		this.player.load(this.videoID)
	}

}

window.customElements.define('modal-video', modalVideo);