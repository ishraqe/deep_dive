@extends('layouts.main')
@section('title')
Contact Us

@endsection
@section('content')
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Contact US</h1>
                            <p>Stay close</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#action-->

    <section id="map-section">
        <div class="container">
            <div id="gmap"> </div>
            <div class="contact-info">
                <h2>Contacts</h2>
                <address>
                    E-mail: <a href="mailto:someone@example.com">email@email.com</a> <br>
                    Phone: +1 (123) 456 7890 <br>
                    Fax: +1 (123) 456 7891 <br>
                </address>

                <h2>Address</h2>
                <address>
                  75/1,Shukrabad <br>
                    Mirpur Road, <br>
                    Dhaka <br>
                    Bangladesh <br>
                </address>
            </div>
        </div>
    </section>
    <!-- #/map -->

@endsection