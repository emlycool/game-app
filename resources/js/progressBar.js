// progressbar.js@1.0.0 version is used
// Docs: http://progressbarjs.readthedocs.org/en/1.0.0/
var ProgressBar = require('progressbar.js')

const popularGamesFragment = document.querySelector('include-fragment[data-name="popularGames"]')
if(popularGamesFragment){
    popularGamesFragment.addEventListener('load', () =>{
        const ratings = document.querySelectorAll('.js-pg-rating')
        ratings.forEach( (ratingNode) => {
            intiateProgressBar(ratingNode)
        })
    })
}


const recentlyReviewedGamesFragment = document.querySelector('include-fragment[data-name="recentlyReviewedGames"]')

if(recentlyReviewedGamesFragment){
    recentlyReviewedGamesFragment.addEventListener('load', () =>{
        const ratings = document.querySelectorAll('.js-rv-rating')
        ratings.forEach( (ratingNode) => {
            intiateProgressBar(ratingNode)
        })
    })
}

const intiateProgressBar = (el) => {
    const bar = new ProgressBar.Circle(el, {
        color: '#dee2e6',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 4,
        trailWidth: 2,
        easing: 'easeInOut',
        duration: 1400,
        text: {
        autoStyleContainer: false
        },
        from: { color: '#f1c12e', width: 2 },
        to: { color: '#ffc100', width: 4 },
        // Set default step function for all animate calls
        step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);
    
        let value = Math.round(circle.value() * 100);
        if (value === 0) {
            circle.setText('');
        } else {
            circle.setText(value);
        }
    
        }
    });
    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar.text.style.fontSize = '.9rem';
    
    bar.animate( Math.round(el.dataset.rating)/100 );  // Number from 0.0 to 1.0
}

( (fn) => {
    const detailsRatings = document.querySelectorAll("[data-details-rating]")
    if(!detailsRatings.length) return
    
    detailsRatings.forEach( (ratingNode) => {
        fn(ratingNode)
    })

})((node) =>{
    intiateProgressBar(node)
})