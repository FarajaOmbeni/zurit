<footer class="py-5">
    <div class="container">
        <div class="row">
            <div class="footer-item col-md-3">
                <!--<img src="img/logo-white3.webp" style="width: 50% height: 50%"alt="">-->
                <p>Address: Zuidier Complex</p>
                <p>Ngumo, Off Mbagathi Road</p>
                <p>Nairobi, KE </p>
                <p>Phone: +254 759 092 412</p>
                <p>Email: info@zuritconsulting.com</p>
            </div>
            <div class="footer-item col-md-3">
                <p class="footer-item-title">Prosperity Tools</p>
                <a href="{{ url('budgetplanner') }}">Budget Planner</a>
                <a href="{{ url('networthcalculator') }}">Networth Calculator</a>
                <a href="{{ url('debtmanager') }}">Debt Manager</a>
                <a href="{{ url('investmentplanner') }}">Investment Planner</a>
            </div>
            <div class="footer-item col-md-3">
                <p class="footer-item-title">Links</p>
                <a href="">About Us</a>
                <a href="">Home</a>
                <a href="">Training</a>
                <a href="">Contact Us</a>
            </div>
            <div class="footer-item col-md-3">
                <p class="footer-item-title">Get In Touch</p>
                <form action="{{ route('subscribe') }}" method="post">
                    @csrf
                    <div class="mb-3 pb-3">
                        <label for="exampleInputEmail1" class="form-label pb-3">Enter your email and we'll
                            send you more information.</label>
                        <input type="email" name="email" placeholder="Your Email" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
            <div class="copyright pt-4 text-center text-muted">
                <p>&copy; {{ date('Y') }} ZURIT CONSULTING</p>

            </div>
        </div>
</footer>
