@extends("layouts/default")

@section("title")
Our Materials
@stop

@section("description")
Learn more about the quality of the materials we use
@stop

@section("header")
  <a ng-click="displayMenu = false">Our Materials</a>
@stop

@section("main")

  <section class="large-7 medium-9 medium-centered columns">
    <br>
    <p>We obsess over the quality of the materials we use, which shows in exclusive leather that gets tanned specifically for us and every detail of our jackets – zippers, buttons, lining, knits, and wool.</p>
  </section>
  <img class="large-9 medium-centered columns sidekick-image" src="/images/photos/leather_materials/leather_hero.jpg" alt="Jacket Chest">
  <div class="clearfix"></div>
  <section class="large-7 medium-9 medium-centered columns">
    <br>
    <h2 class="text-center">Vegetable tanned, chrome&#8208;free, full&#8208;grain leather</h2>
    <br>
    <p>All our jackets are made with the most exclusive, vegetable tanned, full&#8208;grain leather. It’s supple, thick, has a warm touch, and a pleasant smell. With good care, it will not crack or bulge for decades but break in and develop a beautiful patina.</p>
    <p>Our leather is also absolutely free of the chromium salts that can become carcinogenic, found in almost every other leather garment.</p>
    <a class="underlined" href="/leather?jacket=<?php echo e($jacket); ?>">Learn more about leather and why we consider ours to be one of the finest in the world.</a>
  </section>

  <hr class="thin">

  <section class="row">
    <div class="large-9 medium-10 medium-centered columns">
      <h2 class="medium-text-center">Silky, breathable lining</h2>
      <br class="hide-for-small">
      <br>
    </div>
    <div class="large-9 medium-10 medium-centered columns">
      <div class="row two-column-wrapper">
        <div class="large-6 medium-6 columns">
          <img class="sidekick-image" src="/images/photos/leather_materials/lining-red.jpg" alt="Red Lining">
        </div>
        <div class="large-6 medium-6 columns hide-for-small">
          <img class="sidekick-image" src="/images/photos/leather_materials/lining-black.jpg" alt="Black Lining">
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="large-9 medium-10 medium-centered columns">
      <br><br>
      <p>We chose a 100% Bemberg Cupro oxford weave for our lining. No other fabric breathes as well, absorbs and releases sweat as quickly, and is at the same time as smooth as silk. It’s the top lining choice of bespoke suit makers. All pockets are lined with a Tencel twill, a very strong, eco–friendly fabric that makes sure you don’t lose your keys.</p>
    </div>
  </section>

  <hr class="thin">

  <section class="row">
    <div class="large-9 medium-10 medium-centered columns">
      <h2 class="medium-text-center">Super smooth and reliable hardware</h2>
      <br class="hide-for-small">
      <br>
    </div>
    <div class="large-9 medium-10 medium-centered columns">
      <div class="row two-column-wrapper">

        <div class="large-6 medium-6 small-12 columns">
          <img class="sidekick-image " src="/images/photos/leather_materials/zipper_silver_detail.jpg" alt="Zipper Detail">
          <p class="image-caption">All zippers are YKK Excella. They combine legendary reliability with smooth elegance. Each tooth is individually polished, which gives the zipper a brilliant shine and prevents scratching of the jacket or your skin.
            <br>
            <br>
            YKK Excella zippers don’t contain Nickel.
          </p>
        </div>
        <div class="large-6 medium-6 small-12 columns">
          <img class="sidekick-image" src="/images/photos/leather_materials/snap_silver_detail.jpg" alt="Snap Detail">
          <p class="image-caption">The buttons on our jackets are spring&#8208;type snaps from YKK, made purely out of nickel&#8208;free alloys. They receive the same beautiful coatings as our zippers and provide reliable closure without the need to pull too hard and damage the leather when you open them.</p>

        </div>
      </div>
    </div>
  </section>

  <hr class="thin">

  <img class="large-9 medium-centered columns sidekick-image" src="/images/photos/leather_materials/ribbing.jpg" alt="Knits">
  <div class="clearfix"></div>
  <section class="large-7 medium-9 medium-centered columns">
    <h2 class="text-center">Knits</h2>
    <p>Our ribbings are made from one of the most eco-friendly yarns called Tencel, combined with a small amount of elastane to give it the right elasticity. Tencel fibers are extracted from wood and they feel like cotton, only softer, and they’re much more durable. The wristlets and waistbands have the classic double weave – a little looser on the top and tighter at the end.</p>
  </section>

  <hr class="thin">

  <img class="large-9 medium-centered columns sidekick-image" src="/images/photos/leather_materials/fur.jpg" alt="Fur Collar Photo">
  <div class="clearfix"></div>
  <section class="large-7 medium-9 medium-centered columns">
    <h2 class="text-center">Wool Collar</h2>
    <p>The detachable collar on the Linden comes from Merino sheep, known to have the finest and softest wool of any sheep. It will keep you perfectly warm, without overheating.</p>
  </section>
  <section class="row">
    <div class="large-12 medium-12 small-12 text-center">
      @if($jacket)
        <a href="/jackets/<?php echo e($jacket); ?>" class="button">Go Back To Your Jacket</a>
      @else
        <a href="/jackets" class="button">See Our Jackets</a>
      @endif
    </div>
  </section>

  <hr class="thin">

  <section class="row">
    <div class="large-12 medium-12 small-12 text-center">
      <br class="hide-for-large hide-for-small">
      <h2>Own one of our jackets?</h2>
      <p>
        <a href="/care-instructions" class="underlined">See our Care Instructions</a>
      </p>
    </div>
  </section>
@stop