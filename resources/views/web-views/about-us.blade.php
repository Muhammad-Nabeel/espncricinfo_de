@extends('layouts.front-end.app')

@section('title', 'JNK World Wide Express - About Us')

 <!--? slider Area Start-->
 <div class="slider-area ">
            <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="{{asset('/assets/front-end')}}/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap">
                                <h2>About us</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('about-us') }}">About</a></li> 
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!--? About Area Start -->
        <div class="about-low-area section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-caption mb-50">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-35">
                                <span>About Our Company</span>
                                <h2>Safe Logistic & Transport  Solutions That Saves our Valuable Time!</h2>
                            </div>
                            <p>J&K Worldwide Express established in 2015 , an experience more than at least 8 years hasits wide range of network and main connections to companies in U.K, US, Dubai & Far East & to every corner of the world.

We with our very efficient team of Operations , Customer Services and Sales we are able to achieve the customers satisfaction providing door to door services very easily to extremely heavy parcels and important documents.

Detailed proof of delivery information can be provided within minutes of delivery by via email , faxes, direct calls and also by tracking</p>
                           <p>
                           J&K has its deliveries within 72 or 48 hours depending on the type of services used, from the time of pickup to its final destination. Not just this we have tremendous flexibility when it comes to transporting heavy or bulky packages Couriers running in separate regions in Pakistan, collecting all consignments even at the last timings on regular basis and then making it route to our offices where they are operated and then moved to Airport to fly away to the regional HUBS.

We take the shortest distance to get to you and then you to your final destination. Your consignment is collected and taken to the airport by dedicated vehicle, flown to the best airport for it's final destination and then delivered by dedicated vehicle. All customs and clearance are arranged.

Our main goal is to achieve the best remarks of the customer by providing them the most reliable services currently used in courier service industry like DHL, FedEx, & UPS.
                           </p>
                            <a href="{{ route('about-us') }}" class="btn">More About Us</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <!-- about-img -->
                        <div class="about-img ">
                            <div class="about-font-img">
                                <img src="{{asset('/assets/front-end')}}/img/gallery/about2.png" alt="">
                            </div>
                            <div class="about-back-img d-none d-lg-block">
                                <img src="{{asset('/assets/front-end')}}/img/gallery/about1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Area End -->
        <!--? contact-form start -->
        <section class="contact-form-area section-bg  pt-115 pb-120 fix" data-background="{{asset('/assets/front-end')}}/img/gallery/section_bg02.jpg">
            <div class="container">
                <div class="row justify-content-end">
                    <!-- Contact wrapper -->
                    <div class="col-xl-8 col-lg-9">
                        <div class="contact-form-wrapper">
                            <!-- From tittle -->
                            <div class="row">
                               <div class="col-lg-12">
                                    <!-- Section Tittle -->
                                    <div class="section-tittle mb-50">
                                        <span>Get a Qote For Free</span>
                                        <h2>Request a Free Quote</h2>
                                        <p>Brook presents your services with flexible, convenient and cdpose layouts. You can select your favorite layouts & elements for.</p>
                                    </div>
                               </div>
                            </div>
                            <!-- form -->
                            <form action="#" class="contact-form">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-form">
                                            <input type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-form">
                                            <input type="text" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-form">
                                            <input type="text" placeholder="Contact Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="select-items">
                                            <select name="select" id="select1">
                                                <option value="">Freight Type</option>
                                                <option value="">Catagories One</option>
                                                <option value="">Catagories Two</option>
                                                <option value="">Catagories Three</option>
                                                <option value="">Catagories Four</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-form">
                                            <input type="text" placeholder="City of Departure">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="input-form">
                                            <input type="text" placeholder="Incoterms">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="input-form">
                                            <input type="text" placeholder="Weight">
                                        </div>
                                    </div>
                                    <!-- Height Width length -->
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="input-form">
                                            <input type="text" placeholder="Height">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="input-form">
                                            <input type="text" placeholder="Width">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="input-form">
                                            <input type="text" placeholder="length">
                                        </div>
                                    </div>
                                    <!-- Radio Button -->
                                    <div class="col-lg-12">
                                        <div class="radio-wrapper mb-30 mt-15">
                                            <label>Extra services:</label>
                                            <div class="select-radio">
                                                <div class="radio">
                                                    <input id="radio-1" name="radio" type="radio" checked="">
                                                    <label for="radio-1" class="radio-label">Freight</label>
                                                </div>
                                                <div class="radio">
                                                    <input id="radio-2" name="radio" type="radio">
                                                    <label for="radio-2" class="radio-label">Express Delivery</label>
                                                </div>
                                                <div class="radio">
                                                    <input id="radio-4" name="radio" type="radio">
                                                    <label for="radio-4" class="radio-label">Insurance</label>
                                                </div>
                                                <div class="radio">
                                                    <input id="radio-5" name="radio" type="radio">
                                                    <label for="radio-5" class="radio-label">Packaging</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <!-- Button -->
                                    <div class="col-lg-12">
                                        <button name="submit" class="submit-btn">Request a Quote</button>
                                    </div>
                                </div>
                            </form>	
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-form end -->