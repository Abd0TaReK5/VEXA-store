@extends('themes.default.front.layout.master')
@section('title','Contact-Us')
@section('content')
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Information</span>
                            <h2>Contact Us</h2>
                            <p>As we strongly care about our customers' satisfaction , we pay
                                strict attention.</p>
                        </div>
                        <ul>
                            <li>
                                <h4>Egypt</h4>
                                <p>Shebeen El-Kom gamal abdel nasser ST <br />+20-1096192125</p>
                            </li>
                            <li>
                                <h4>Cairo</h4>
                                <p>5TH settelment <br />+20-1096192125</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message"></textarea>
                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection