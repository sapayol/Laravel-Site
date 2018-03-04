<div class="image-section">
  <img ng-if="!showBack" ng-src="/images/photos/jackets/{{{ $jacket->model }}}/variations/@{{ leather_color }}/@{{ front_image }}-medium.jpg"  alt="Jacket Front Preview">
  <img ng-if="showBack" ng-src="/images/photos/jackets/{{{ $jacket->model }}}/variations/@{{ leather_color }}/@{{ back_image }}-medium.jpg"  alt="Jacket Back Preview">
  <a class="underlined" ng-click="showBack = !showBack">
    <small>View
      <span ng-if="!showBack">Back</span>
      <span ng-if="showBack">Front</span>
    </small>
  </a>
  <a href="/images/photos/jackets/{{{ $jacket->model }}}/variations/@{{ leather_color }}/@{{ front_image }}-large.jpg" class="underlined" ng-if="!showBack">
    <small>Enlarge</small>
  </a>
  <a href="/images/photos/jackets/{{{ $jacket->model }}}/variations/@{{ leather_color }}/@{{ back_image }}-large.jpg" class="underlined" ng-if="showBack">
    <small>Enlarge</small>
  </a>
</div>