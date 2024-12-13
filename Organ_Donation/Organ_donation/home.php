<?php

include_once('helper/connection.php');
include_once('helper/header.php');
?>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }
    strong
{
    color:white;
}
    #hero {
        text-align: center;
        padding: 100px 20px;
        color: #fff;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('static/home.jpg') center/cover no-repeat;
    }

    #hero h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    card {
        padding: auto;
        margin: auto;
        background-color: #011522;
        border-radius: 8px;
        z-index: 1;
        color: #fff;
    }

    .content-section {
        padding: 15px;
        /* Adjust padding based on your design */
    }

    .content-section h2 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .content-section p {
        font-size: 1rem;
        margin-bottom: 15px;
    }


    .logo {
        height: 180px;
        width: 180px;
        border-radius: 50%;
        border: 4px solid tan;
    }

    .cta-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: tan;
        color: black;
        text-decoration: none;
        font-weight: bold;
        font-size: 18px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .cta-button:hover {
        background-color: #696865;
    }

    section {
        background-color: black;
        color: white;
        margin: 20px 0;
        padding: 40px 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-size: 2rem;
        color: tan;
        margin-bottom: 20px;
    }

    h3 {
        font-size: 1.5rem;
        color: white;
        margin-bottom: 15px;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    p {
        color: white;
    }

    ul li {
        margin-bottom: 10px;
    }

    strong {
        color: #000000;
    }

    footer {
        background-color: #000;
        padding: 20px;
        color: #fff;
        text-align: center;
    }

    footer a {
        color: #fff;
        text-decoration: none;
    }

    footer a:hover {
        text-decoration: underline;
    }
</style>

<section id="hero">
    <img class="logo" src="static/home.jpg" alt="Organ Donation Hero Image">
    <h1>Give the Gift of Life: Become an Organ Donor</h1>
    <a href="donation_form/donationform1.php" class="cta-button">Sign Up Now</a>
</section>

<div class="card">
    <section id="about-us">
        <h2>About Us</h2>
        <p>Mission statement and organization details go here.</p>
        <p>Highlight the impact of organ donation on saving lives.</p>
        <p>Share key statistics related to organ donation.</p>
    </section>
</div>
<section id="organ-donation-info">
    <h2>Organ Donation Information</h2>

    <p>Welcome to our Organ Donation Website, dedicated to making a positive impact on healthcare through organ
        donation. Our mission is to save lives by connecting organ donors with those in need of life-saving transplants.
    </p>

    <p>As an organization, we are committed to raising awareness about the significance of organ donation and providing
        a platform for individuals to contribute to this life-saving cause.</p>

    <h3>Impact of Organ Donation:</h3>
    <ul>
        <li>Every organ donation can potentially save multiple lives.</li>
        <li>It offers hope and a second chance at life to individuals facing organ failure.</li>
        <li>Organ donation fosters a sense of community and compassion, bringing people together for a common cause.
        </li>
    </ul>

    <h3>Key Statistics:</h3>
    <ul>
        <li>Millions of people worldwide are in need of organ transplants.</li>
        <li>A single organ donor can save up to eight lives.</li>
        <li>Organ transplants have a high success rate and significantly improve the quality of life for recipients.
        </li>
    </ul>

    <p>Join us in making a difference! An illustration of a group of people sitting side-by-side symbolizes unity in our
        mission to save lives through organ donation. In the foreground, a man is raising his hand, showing his
        commitment to this life-saving cause.</p>

    <p>Currently, there are <strong>103,223</strong> men, women, and children on the national transplant waiting list,
        eagerly awaiting the gift of life.</p>

    <h3>For Workplaces:</h3>
    <ul>
        <li>Discover ways to champion the cause of organ donation in your workplace and community.</li>
        <li>Be a catalyst for change and learn how to effectively spread the word about the importance of organ
            donation.</li>
    </ul>
</section>

<!-- Get Involved Section -->
<section id="get-involved">
    <h2>Get Involved</h2>
    <p>Discover the power of real-life stories, explore volunteer opportunities, and stay updated on upcoming events
        that make a meaningful impact on organ donation.</p>

    <h3>Real-Life Donor Stories:</h3>
    <p>Read inspiring stories of individuals who have made a difference through organ donation. Learn about the lives
        they've touched and the positive impact they've created.</p>

    <h3>Volunteer Opportunities:</h3>
    <p>Be a part of our dedicated team! Explore various volunteer opportunities that allow you to contribute your time,
        skills, and passion to the cause of organ donation. Whether it's raising awareness, organizing events, or
        providing support, there's a place for you.</p>

    <h3>Upcoming Events:</h3>
    <p>Stay informed about upcoming events related to organ donation. Join us in community activities, seminars, and
        campaigns that aim to spread awareness and encourage more people to become organ donors.</p>
</section>

<!-- Call-to-Action Section -->
<section id="cta">
    <h2>Make a Difference Today</h2>
    <a href="donation_form/donationform1.php" class="cta-button">Register as a Donor</a>
    <p>Share the message with your friends and family.</p>
</section>

<!-- Support Section -->
<section id="support">
    <h2>Support</h2>
    <p>Links to resources, contact information, and chat support.</p>
</section>
<footer>
    <a href="mailto:dishatimbadiya055@gmail.com" style="color:white;">Email</a>
    <p>© 2023 All rights reserved.</p>
</footer>

</html>