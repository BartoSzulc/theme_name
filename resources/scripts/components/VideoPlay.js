import Component from "./Component";

export default class VideoPlay extends Component {
  constructor() {
    super();
    this.playButton = document.querySelector('.play-button');
    this.video = document.querySelector('.video-src');
  }
  init() {
    this.playVideo();
  }

  playVideo() {
    this.playButton.addEventListener('click', () => {
        // console.log('click!')
        if(this.video.paused) {
            this.video.play()
            this.playButton.classList.add("play-button__hidden");
            
        }
    })
    if(this.video.played) {
      this.video.addEventListener('click', () => { 
        this.video.pause()
        this.playButton.classList.remove("play-button__hidden");
        
      })
    }

  }

}
