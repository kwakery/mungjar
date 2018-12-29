<nav>
  <a href="/"><h1>mungjar</h1></a>
  <ul>
    <li class="{{ isActive("portfolio") }}"><a href="/portfolio">portfolio</a></li>
    <li class="{{ isActive("commission") }}"><a href="/commission">commission</a></li>
    <li class="{{ isActive("faq") }}"><a href="/faq">faq</a></li>
    <li class="{{ isActive("contact") }}"><a href="/contact">contact</a></li>
  </ul>
  @if (Request::is('/'))
    <img src="/images/logo.png" alt="" width="25%">

    <div class="social center">
      <a href="{{ config('social.twitch.url') }}"><span class="social-group"><i class="fab fa-twitch" aria-hidden="true"></i> {{ config('social.twitch.name') }}</span></a>
      <a href="{{ config('social.twitter.url') }}"><span class="social-group"><i class="fab fa-twitter" aria-hidden="true"></i> {{ config('social.twitter.name') }}</span></a>
      <a href="{{ config('social.instagram.url') }}"><span class="social-group"><i class="fab fa-instagram" aria-hidden="true"></i> {{ config('social.instagram.name') }}</span></a>
    </div>
  @endif
</nav>
