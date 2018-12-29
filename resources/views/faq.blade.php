@section('title', 'FAQ')
@section('name', 'Frequently Asked Questions')

@extends('layouts.app')

@section('content')
<h4>How does your commission process work?</h4>
<p>Commissions are a multi-step process.</p>

<ol type="1">
    <li>You will request your commission through the <a href="/commissions/create">commission form.</a></li>
    <li>I will look over your commission and approve/deny it.</li>
    <li>If I approve your commission, then I will send an invoice to your PayPal.</li>
    <li>If you do not respond to the invoice within a week, the commission will be dropped.</li>
    <li>Once the invoice is paid, I will send you your commission within 2-3 weeks.</li>
</ol>

<h4>What are your prices?</h4>
<a href="/pricing">Click here to view my prices.</a>

<h4 id="commercial-use">What counts as commercial use?</h4>
<p>Commercial use is when my work is used for any commercial purpose including, but not limited to, advertisements, for-profit websites/businesses logos, business letterheads, business stationery, T-shirts, posters, stickers, graphics within
    software, and packaging for any product.</p>

<strong>Indirect Commercial Use</strong>
<p>If you use my work, and you or your organization generates income, then it counts as commercial use. This includes, but not limited to, using your commission for publicity, such as utilizing the art on social media sites like Youtube, Tumblr,
    Twitch, or as website decoration, etc.</p>
<p>For this, you will be charged 2x the quoted price.</p>

<strong>Direct Commercial Use</strong>
<p>The work is a component of a product (such as game art) or is sold directly, such as putting it on stickers/t-shirts/etc and selling the product.</p>
<p>For this, you will be charged 3x the quoted price.</p>

<h4>When do you begin working on my commission?</h4>
<p>I will begin working on it once I approve your payment and you pay the invoice on your PayPal.</p>

<h4>What payment methods do you accept?</h4>
<p>I will only be accepting PayPal at this time.</p>

<h4>Will I be able to ask for revisions?</h4>
<p>Yes, you can ask for revisions before the final is given to you.</p>

<h4>Why did my request get dropped?</h4>
<ul>
    <li>You failed to pay the invoice within a week</li>
    <li>Send another commission request if you would still like a commission.</li>
</ul>

<h4>Can I cancel my commission?</h4>
<p>If you have not paid for the commission yet, then the request will automatically be canceled after a week. If you have paid, then there will be a fee of half of what you paid.</p>

<h4>Do I need to credit you for your work?</h4>
<p>Yes, please provide <a href="/tos#license">proper credits</a></p>
@endsection
