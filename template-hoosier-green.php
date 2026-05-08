<?php
/* Template Name: Hoosier Green One-Sheeter */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hoosier Green Web — Your Website, Simplified</title>
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&family=Lora:wght@400;600&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --forest: #1e3a2f;
    --moss: #3b6e4a;
    --sage: #7aab85;
    --mint: #e4f0e8;
    --cream: #faf8f3;
    --bark: #4a3728;
    --warm-gray: #8a8480;
    --offwhite: #f5f3ee;
    --leaf: #5a9e6a;
  }

  body {
    font-family: 'DM Sans', sans-serif;
    font-weight: 400;
    background: var(--cream);
    color: var(--forest);
    min-height: 100vh;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
  }

  .page {
    max-width: 760px;
    margin: 0 auto;
    padding: 0;
    background: #fff;
    box-shadow: 0 0 40px rgba(0,0,0,0.08);
  }

  .header {
    background: var(--forest);
    color: #fff;
    padding: 44px 52px 36px;
    position: relative;
    overflow: hidden;
  }

  .header::before {
    content: '';
    position: absolute;
    top: -60px; right: -60px;
    width: 260px; height: 260px;
    border-radius: 50%;
    background: rgba(90,158,106,0.15);
  }

  .header::after {
    content: '';
    position: absolute;
    bottom: -40px; left: 120px;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: rgba(122,171,133,0.10);
  }

  .header-eyebrow {
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--sage);
    margin-bottom: 10px;
  }

  .header h1 {
    font-family: 'Lora', serif;
    font-size: 34px;
    font-weight: 600;
    line-height: 1.2;
    color: #fff;
    max-width: 480px;
    margin-bottom: 12px;
  }

  .header-sub {
    font-size: 15px;
    font-weight: 300;
    color: rgba(255,255,255,0.72);
    max-width: 440px;
    line-height: 1.6;
  }

  .green-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(90,158,106,0.25);
    border: 1px solid rgba(122,171,133,0.4);
    color: #a8d4b0;
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: 5px 12px;
    border-radius: 20px;
    margin-top: 20px;
  }

  .green-badge svg {
    width: 13px; height: 13px; flex-shrink: 0;
  }

  .body {
    padding: 0 52px 48px;
  }

  .section {
    padding: 36px 0;
    border-bottom: 1px solid #edeae3;
  }

  .section:last-child {
    border-bottom: none;
  }

  .section-label {
    font-size: 10.5px;
    font-weight: 500;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--leaf);
    margin-bottom: 10px;
  }

  .section h2 {
    font-family: 'Lora', serif;
    font-size: 22px;
    font-weight: 600;
    color: var(--forest);
    margin-bottom: 12px;
    line-height: 1.25;
  }

  .section p {
    font-size: 15px;
    line-height: 1.75;
    color: #3d3d3a;
    max-width: 620px;
  }

  .section p + p {
    margin-top: 10px;
  }

  .analogy-box {
    background: var(--mint);
    border-left: 3px solid var(--sage);
    padding: 16px 20px;
    border-radius: 0 8px 8px 0;
    margin-top: 18px;
  }

  .analogy-box p {
    font-family: 'Lora', serif;
    font-style: italic;
    font-size: 14.5px;
    color: var(--moss);
    line-height: 1.65;
  }

  .compare-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-top: 20px;
  }

  .compare-card {
    border: 1px solid #e0ddd5;
    border-radius: 10px;
    padding: 18px 20px;
    background: var(--offwhite);
  }

  .compare-card.highlight {
    border-color: var(--sage);
    background: var(--mint);
  }

  .compare-card-label {
    font-size: 10px;
    font-weight: 500;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--warm-gray);
    margin-bottom: 8px;
  }

  .compare-card.highlight .compare-card-label {
    color: var(--moss);
  }

  .compare-card h3 {
    font-size: 15px;
    font-weight: 500;
    color: var(--forest);
    margin-bottom: 10px;
  }

  .compare-card ul {
    list-style: none;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 7px;
  }

  .compare-card ul li {
    font-size: 13.5px;
    color: #4a4a47;
    display: flex;
    align-items: flex-start;
    gap: 7px;
    line-height: 1.45;
  }

  .compare-card ul li::before {
    content: '✕';
    color: var(--warm-gray);
    flex-shrink: 0;
    margin-top: 1px;
  }

  .compare-card.highlight ul li::before {
    content: '✓';
    color: var(--leaf);
  }

  .green-section {
    background: var(--forest);
    color: #fff;
    margin: 0 -52px;
    padding: 36px 52px;
  }

  .green-section .section-label {
    color: var(--sage);
  }

  .green-section h2 {
    color: #fff;
  }

  .green-section p {
    color: rgba(255,255,255,0.78);
  }

  .stat-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-top: 22px;
  }

  .stat-card {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 10px;
    padding: 16px 18px;
  }

  .stat-number {
    font-family: 'Lora', serif;
    font-size: 26px;
    font-weight: 600;
    color: var(--sage);
    line-height: 1;
    margin-bottom: 5px;
  }

  .stat-label {
    font-size: 12.5px;
    color: rgba(255,255,255,0.6);
    line-height: 1.4;
  }

  .cert-line {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid rgba(255,255,255,0.12);
  }

  .cert-badge {
    background: rgba(90,158,106,0.2);
    border: 1px solid rgba(122,171,133,0.3);
    border-radius: 6px;
    padding: 5px 12px;
    font-size: 11.5px;
    color: var(--sage);
    font-weight: 500;
    white-space: nowrap;
  }

  .cert-text {
    font-size: 13px;
    color: rgba(255,255,255,0.6);
    line-height: 1.5;
  }

  .include-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    margin-top: 20px;
  }

  .include-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 14px;
    color: #3d3d3a;
    line-height: 1.45;
  }

  .include-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: var(--leaf);
    flex-shrink: 0;
    margin-top: 5px;
  }

  .price-block {
    background: var(--offwhite);
    border: 1px solid #dddad0;
    border-radius: 12px;
    padding: 24px 28px;
    margin-top: 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
  }

  .price-tag {
    font-family: 'Lora', serif;
    font-size: 42px;
    font-weight: 600;
    color: var(--forest);
    line-height: 1;
  }

  .price-tag span {
    font-size: 18px;
    font-weight: 400;
    color: var(--warm-gray);
    vertical-align: super;
    font-family: 'DM Sans', sans-serif;
    margin-right: 2px;
  }

  .price-tag small {
    font-size: 15px;
    font-weight: 300;
    font-family: 'DM Sans', sans-serif;
    color: var(--warm-gray);
  }

  .price-note {
    font-size: 12.5px;
    color: var(--warm-gray);
    margin-top: 5px;
  }

  .price-right {
    font-size: 13.5px;
    color: #5a5a55;
    line-height: 1.65;
    max-width: 260px;
  }

  .footer {
    background: var(--offwhite);
    border-top: 1px solid #e0ddd5;
    padding: 24px 52px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    flex-wrap: wrap;
  }

  .footer-brand {
    font-family: 'Lora', serif;
    font-size: 16px;
    font-weight: 600;
    color: var(--forest);
  }

  .footer-contact {
    font-size: 13px;
    color: var(--warm-gray);
    text-align: right;
    line-height: 1.7;
  }

  @media print {
    body { background: #fff; }
    .page { box-shadow: none; }
  }

  @media (max-width: 580px) {
    .header, .body, .footer { padding-left: 28px; padding-right: 28px; }
    .green-section { margin: 0 -28px; padding: 36px 28px; }
    .compare-row, .stat-row, .include-grid { grid-template-columns: 1fr; }
    .price-block { flex-direction: column; }
    .footer { flex-direction: column; }
    .footer-contact { text-align: left; }
    .header h1 { font-size: 26px; }
  }
</style>
</head>
<body>
<div class="page">

  <div class="header">
    <p class="header-eyebrow">Hoosier Green Web</p>
    <h1>Your website, handled by a neighbor.</h1>
    <p class="header-sub">Reliable hosting, a real person you can call, and energy that's good for the planet — without any of the tech headaches.</p>
    <div class="green-badge">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"></path>
        <path d="M8 12l3 3 5-5"></path>
      </svg>
      300% renewable energy · EPA Green Power Partner
    </div>
  </div>

  <div class="body">

    <div class="section">
      <p class="section-label">Starting from scratch</p>
      <h2>What is web hosting, anyway?</h2>
      <p>Think of your website as a shop. The domain name — like <em>yourbakery.com</em> — is your address on the street. Web hosting is the physical building: the space where your website actually lives, running 24 hours a day so customers can find you anytime.</p>
      <p>Without hosting, your website doesn't exist. With good hosting, it loads fast, stays secure, and never goes dark during a busy weekend.</p>
      <div class="analogy-box">
        <p>"A web host is like a landlord for your website — you pay a monthly fee, they keep the lights on, and a good one handles the maintenance so you don't have to."</p>
      </div>
    </div>

    <div class="section">
      <p class="section-label">Making the move</p>
      <h2>What does moving away from WP Engine mean?</h2>
      <p>Switching hosts sounds complicated, but it's a fully managed process — you won't need to touch a thing. The site files, database, and email all move over, and your domain just gets pointed to the new address. To visitors, nothing changes.</p>

      <div class="compare-row">
        <div class="compare-card">
          <p class="compare-card-label">WP Engine (currently)</p>
          <h3>What you're paying for</h3>
          <ul>
            <li>Enterprise-tier pricing built for agencies and large sites</li>
            <li>Self-serve support through tickets and chat queues</li>
            <li>No local point of contact</li>
            <li>Renewal rates often creep up quietly</li>
          </ul>
        </div>
        <div class="compare-card highlight">
          <p class="compare-card-label">Hoosier Green Web</p>
          <h3>What you'd get instead</h3>
          <ul>
            <li>Flat monthly rate, no surprise renewals</li>
            <li>A real person who knows your site by name</li>
            <li>Email support, 48-hour response or faster</li>
            <li>Full migration handled at no extra charge</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="section green-section">
      <p class="section-label">Why it matters</p>
      <h2>The environmental angle — and why it's real</h2>
      <p>The internet uses more energy than most people realize. Data centers worldwide consume vast amounts of power — and cooling alone accounts for nearly 40% of it. By 2040, internet infrastructure is projected to produce 14% of global carbon emissions.</p>
      <p style="margin-top: 10px;">Our infrastructure runs through <strong style="color: rgba(255,255,255,0.92);">GreenGeeks</strong> — the only web host verified to put 3× the energy it uses back into the grid as renewable energy credits, every year, through a third-party environmental foundation.</p>

      <div class="stat-row">
        <div class="stat-card">
          <div class="stat-number">300%</div>
          <div class="stat-label">Renewable energy credits returned to the grid for every unit used</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">2009</div>
          <div class="stat-label">Year GreenGeeks became an EPA Green Power Partner</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">1 tree</div>
          <div class="stat-label">Planted for every hosting account, through One Tree Planted</div>
        </div>
      </div>

      <div class="cert-line">
        <span class="cert-badge">Third-party verified</span>
        <p class="cert-text">Green-e certified through the Bonneville Environmental Foundation (BEF) in Portland, OR. Annual renewable energy certificates on file.</p>
      </div>
    </div>

    <div class="section">
      <p class="section-label">The Neighbor plan — $30/month</p>
      <h2>Everything your site needs, nothing you don't</h2>
      <p>The Neighbor plan is designed for small business sites that need to stay online, stay safe, and stay off your to-do list.</p>

      <div class="include-grid">
        <div class="include-item"><div class="include-dot"></div><span>Reliable hosting on green infrastructure</span></div>
        <div class="include-item"><div class="include-dot"></div><span>SSL certificate (the padlock in the browser)</span></div>
        <div class="include-item"><div class="include-dot"></div><span>Daily automatic backups</span></div>
        <div class="include-item"><div class="include-dot"></div><span>Domain management — renewals handled</span></div>
        <div class="include-item"><div class="include-dot"></div><span>Uptime monitoring — I get alerted, not you</span></div>
        <div class="include-item"><div class="include-dot"></div><span>Email support with 48-hour response</span></div>
      </div>

      <div class="price-block">
        <div class="price-left">
          <div class="price-tag"><span>$</span>30<small> / month</small></div>
          <p class="price-note">Flat rate · no contracts · cancel anytime</p>
        </div>
        <div class="price-right">
          Migration from WP Engine is included at no extra charge for new clients. Setup fee waived during the founding client period — ask for details.
        </div>
      </div>
    </div>

  </div>

  <div class="footer">
    <div class="footer-brand">Hoosier Green Web</div>
    <div class="footer-contact">
      hi@ericrees.email &nbsp;·&nbsp; (317) 824-9928
    </div>
  </div>

</div>
</body>
</html>
