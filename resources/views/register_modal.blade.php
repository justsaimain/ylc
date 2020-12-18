<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Register</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login">
                    <form action="{{ url('register') }}" method="POST" class="row">
                        @csrf
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Full Name">
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="phone" name="phone"
                                placeholder="Phone Number">
                        </div>
                        <div class="col-12">
                            <input type="password" class="form-control mb-3" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="col-12">
                            <input type="password" class="form-control mb-3" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirm Password">
                        </div>
                        <div class="col-md-6">
                            <select class="form-control mb-3" name="region" id="region_select">
                                <option selected>Select Region</option>
                                @foreach ($regions as $region)
                                <option value="{{ $region['name'] }}" data-reg="{{ $region['id'] }}">
                                    {{ $region['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control mb-3" name="township" id="township_select">
                                <option selected>Select Township</option>
                            </select>
                        </div>
                        <div class="col-12 mb-5 mt-2">
                            <input type="checkbox" name="accept" id="accept" class="d-inline">
                            <label class="d-inline" for="accept">I have read and accept the <a href="#">Privacy
                                    Policy</a>. I
                                consent to my details being
                                shared with the relevant Wall Street English local partner to contact me with further
                                information.</label>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>