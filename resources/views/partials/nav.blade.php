<nav>
  <a href="/"><h1>mungjar</h1></a>
  <ul>
    <li><a href="/portfolio">portfolio</a></li>
    <li><a href="/commission">commission</a></li>
    <li><a href="/contact">contact</a></li>
    <li><a href="/faq">faq</a></li>
  </ul>
  @if (Request::is('/'))
    <img src="/images/logo.png" alt="" width="25%">

    <div class="social center">
      <a href="https://twitch.tv/mungjar"><span class="social-group"><i class="fab fa-twitch" aria-hidden="true"></i> mungjar</span></a>
      <a href="https://twitter.com/mungasaur"><span class="social-group"><i class="fab fa-twitter" aria-hidden="true"></i> mungasaur</span></a>
      <a href="https://instagram.com/mungjar"><span class="social-group"><i class="fab fa-instagram" aria-hidden="true"></i> mungjar</span></a>
    </div>
  @endif
</nav>
