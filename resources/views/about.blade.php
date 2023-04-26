@extends('layouts.front-layout')
@section('content')

<section id="page-header" class="about-header">
    <h2>#KnowUs</h2>
    <p>We are working for your thought!</p>
</section>

<!--about-->

<section id="about-head" class="section-p1">
    <img src="img/about/a6.jpg" alt="">
    <div>
        <h2>Who We Are?</h2>
        <p>Copyright ownership gives the owner the exclusive right
            to use the work, with some exceptions. When a person creates
             an original work, fixed in a tangible medium,
             he or she automatically owns copyright to the work.</p>

             <abbr title="">Copyright ownership gives the owner the exclusive right
             to use the work, with some exceptions.</abbr>

             <br><br>

             <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%" >
                Copyright ownership gives the owner the exclusive right
             to use the work, with some exceptions.
             </marquee>
    </div>
</section>

<!--about video app-->

<section id="about-app" class="section-p1">
    <h1>Short Visit At <a href="#" style="color: #088178;">Foot Locker</a></h1>
    <div class="video">
        <video  autoplay muted loop src="img/about/1.mp4"></video>
    </div>
</section>

<!---xix emogi-->
<section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="img/features/f1.png" alt="">
        <h6>Free Shiping</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f2.png">
        <h6>Online Order</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f3.png">
        <h6>Save Money</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f4.png">
        <h6>Happy Sell</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f6.png">
        <h6>F24/7 Support</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f1.png">
        <h6>Free Shiping</h6>
    </div>
</section>

<!--News letter-->

<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4>Sign for Newsletter</h4>
        <p>Get E-mail update about our latest shop and<span> special offers</span></p>
    </div>
    <div class="form">
        <input type="text" placeholder="Your Email Address">
        <button class="normal">Sign Up</button>
    </div>
</section>




@endsection
