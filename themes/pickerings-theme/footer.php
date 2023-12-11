<footer style="padding-top: 1300px">


</footer>

<? wp_footer(); ?>
<!-- Include Bootstrap scripts first -->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

<!-- Then include Lottie Interactivity script -->
<script src="https://unpkg.com/@lottiefiles/lottie-player@1/dist/lottie-player.js"></script>

<script src="https://unpkg.com/@lottiefiles/lottie-interactivity@latest/dist/lottie-interactivity.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.velocity.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.min.js"></script>
<script>

const images = document.querySelectorAll('.img-in');

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
        } else {
            entry.target.classList.remove('active');
        }
    });
}, { threshold: 0.5 });

images.forEach(image => {
    observer.observe(image);
});

    var words = ["Responsive", "Efficient", "Secure", "Interactive", "Scalable", "User-friendly", "Optimized", "Intuitive", "Robust", "Dynamic"];
    var changingTextElement = document.getElementById("changingText");
    var lastIndex;

    function updateText() {
        // Ensure the new index is different from the previous one
        var randomIndex;
        do {
            randomIndex = Math.floor(Math.random() * words.length);
        } while (randomIndex === lastIndex);

        lastIndex = randomIndex;

        // Apply fade-out effect
        changingTextElement.style.opacity = 0.2;

        // Update text content after the fade-out
        setTimeout(function () {
            changingTextElement.textContent = words[randomIndex];

            // Apply fade-in effect
            changingTextElement.style.opacity = 1;
        }, 500); // 500 milliseconds (0.5 seconds) matches the transition duration in CSS
    }

    setInterval(updateText, 2000);

    // init controller
    var controller = new ScrollMagic.Controller();

    // create a scene
    new ScrollMagic.Scene({
        triggerElement: '#point1',
        duration: 1000, // the scene should last for a scroll distance of 1000px
        offset: 0, // start this scene after scrolling for 50px
        reverse: true
    })
        .setPin('#point1') // pins the element for the scene's duration
        .setClassToggle('#point1', 'fade-in')

        .addTo(controller) // assign the scene to the controller
        .addIndicators();

    new ScrollMagic.Scene({
        triggerElement: '#point2',
        duration: 1000, // the scene should last for a scroll distance of 1000px
        offset: 0, // start this scene after scrolling for 50px

    })
        .setPin('#point2') // pins the element for the scene's duration
        .setClassToggle('#thanks', 'fade-in')

        .addTo(controller) // assign the scene to the controller
        .addIndicators();


    new ScrollMagic.Scene({
        triggerElement: '#point3',
        duration: 1000, // the scene should last for a scroll distance of 1000px
        offset: 0, // start this scene after scrolling for 50px

    })
        .setPin('#point3') // pins the element for the scene's duration
        .setClassToggle('#howdy', 'fade-in')

        .addTo(controller) // assign the scene to the controller
        .addIndicators();

    new ScrollMagic.Scene({
        triggerElement: '#point4',
        duration: 0, // the scene should last for a scroll distance of 1000px
        offset: 50, // start this scene after scrolling for 50px

    })
        .setPin('#point4') // pins the element for the scene's duration
        .setClassToggle('.about-me-text', 'fade-in')

        .addTo(controller) // assign the scene to the controller
        .addIndicators();


    new ScrollMagic.Scene({
        triggerElement: '#point6',
        duration: 0, // the scene should last for a scroll distance of 1000px
        offset: -50, // start this scene after scrolling for 50px

    })
        .setPin('#point6') // pins the element for the scene's duration
        .setClassToggle('.fly-right', 'fly-right-in')

        .addTo(controller) // assign the scene to the controller
        .addIndicators();

    // init controller
    var controller = new ScrollMagic.Controller();

    // build tween
    // init controller
    var controller = new ScrollMagic.Controller();

    // build tween
    var tween = TweenMax.to("#target3", 0.5, { css: { maxWidth: "100%" }, ease: Linear.easeNone });
    var tween2 = TweenMax.to("#target4", 0.5, { css: { maxHeight: "450px" }, ease: Linear.easeNone });
    var tween3 = TweenMax.to("#target2", 0.5, { css: { left: "0", opacity: "1" }, ease: Linear.easeNone });
    var tween4 = TweenMax.to("#target1", 0.5, { css: { right: "0", opacity: "1" }, ease: Linear.easeNone });
    var tween5 = TweenMax.to("#target5", 0.5, { css: { top: "0", opacity: "1", filter: "saturate(1)" }, ease: Linear.easeNone });
    var tween6 = TweenMax.to("#target6", 0.5, { css: { maxHeight: "400px" }, ease: Linear.easeNone });
    // build scene
    var scene = new ScrollMagic.Scene({ triggerElement: "#trigger", duration: 150, offset: 200 })
        .setTween(tween)
        .addIndicators() // add indicators (requires plugin)
        .addTo(controller);

    var scene2 = new ScrollMagic.Scene({ triggerElement: "#trigger2", duration: 300, offset: 0 })
        .setTween(tween2)
        .addIndicators() // add indicators (requires plugin)
        .addTo(controller);

    var scene3 = new ScrollMagic.Scene({ triggerElement: "#trigger3", duration: 500, offset: -300 })
        .setTween(tween3)
        .addIndicators() // add indicators (requires plugin)
        .addTo(controller);

    var scene4 = new ScrollMagic.Scene({ triggerElement: "#trigger4", duration: 200, offset: -150 })
        .setTween(tween4)
        .addIndicators() // add indicators (requires plugin)
        .addTo(controller);

    var scene5 = new ScrollMagic.Scene({ triggerElement: "#trigger5", duration: 200, offset: 100 })
        .setTween(tween5)
        .addIndicators() // add indicators (requires plugin)
        .addTo(controller);


    var scene6 = new ScrollMagic.Scene({ triggerElement: "#trigger6", duration: 250, offset: 700 })
        .setTween(tween6)
        .addIndicators() // add indicators (requires plugin)
        .addTo(controller);
</script>
</body>

</html>