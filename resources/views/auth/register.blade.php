@extends('layouts.app')

@section('content')
    <div class="registration-container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h1 class="text-center">UP Mountaineers Pithaya</h1>
                <hr>
                <small><em>Filipino</em></small>
                <h4 class="mt-2">Ang Pithaya ay isang pagpapahayag ng ating mithiing:</h4>
                <ol>
                    <li>Panatilihin ang Dalisay na Kagandahan ng ating Kapaligiran;</li>
                    <li>Magkaisa upang makamit ang mga indibidwal at pangkalahatang layunin;</li>
                    <li>Sumunod sa mga alituntuning pangkaligtasan at tamang asal;</li>
                    <li>Magbigay at tumanggap ng makatotohanang pagpuna sa sarili at sa iba; at</li>
                    <li>Pagibayuhin ang pagkaunawa at sikaping mabago ang nakasasamang ugali.</li>
                </ol>
                <h4>Hinihingi ng Pithaya and mga sumusunod na pasya:</h4>
                <ol>
                    <li>Pagunawa at pagsunod sa mga itinakdang responsibilidad;</li>
                    <li>Pangalagaan ang kapakanan at kaligatasan ng mga kasama at sarili;</li>
                    <li>Pag-iwas sa pag-inom ng alak at paninigarilyo sa mga "Training Activities";</li>
                    <li>Pag-iwas sa paggawa ng anumang bagay na makakaabala o ikagagalit ng mga kasamahan;</li>
                    <li>Pagunawa at pagsunod sa "Leave No Trace Principles";</li>
                    <li>Paggalang sa kapwa montaneryo anuman ang kasarian, paninwalang ispiritwal, lahi at katayuang panlipunan;</li>
                    <li>Paggalang sa mga pag-aari ng iba, paggamit ng wasto at pagsauli sa takdang oras ng mga hiram na gamit; at</li>
                    <li>Pagkakaroon ng kusa at kahandaang magsakripisyo alang-alang sa kapakanan ng nakararami at ng kalikasan</li>
                </ol>
                <hr>
                <small><em>English</em></small>
                <h4 class="mt-2">The Pithaya is a declaration of our mission to:</h4>
                <ol>
                    <li>Maintain the pristine beauty of the environment;</li>
                    <li>Unite towards achieving individual and group goals;</li>
                    <li>Follow all safety and behavioral guidelines;</li>
                    <li>Give and receive honest criticism and self-criticism; and</li>
                    <li>Improve self-awareness and strive to change negative behavior.</li>
                </ol>
                <h4>The Pithaya asks for the following commitments:</h4>
                <ol>
                    <li>To accept and understand assigned responsibilities and to do them dutifully;</li>
                    <li>To look after the welfare and safety of fellow climbers and myself;</li>
                    <li>To abstain from drinking alcoholic beverages and smoking during training activities;</li>
                    <li>To refrain from producing stimuli that may offend other climbers;</li>
                    <li>To understand and practice “Leave no Trace Principles”;</li>
                    <li>To respect fellow climbers regardless of gender, spiritual beliefs, race, and social status;</li>
                    <li>To respect other people's property; to handle properly and return promptly all borrowed property; and</li>
                    <li>To exercise initiative and willingness to sacrifice to the interest of the group and the environment.</li>
                </ol>
            </div>
            <div class="col-md-5">
                <h1 class="text-center">Applicant Registration Form</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row mt-5">
                        <label for="first_name" class="col-md-4 col-form-label text-md-left">{{ __('First Name') }}</label>
                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_name" class="col-md-4 col-form-label text-md-left">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birthdate" class="col-md-4 col-form-label text-md-left">{{ __('Birth Date') }}</label>

                        <div class="col-md-6">
                            <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate">
                            @error('birthdate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contact_number" class="col-md-4 col-form-label text-md-left">{{ __('Contact Number') }}</label>
                        <div class="col-md-6">
                            <input id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" required autocomplete="contact_number" autofocus>

                            @error('contact_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="is_student" class="col-md-4 col-form-label text-md-left">{{ __('Are you a UP student?') }}</label>

                        <div class="col-md-6">
                            <select name="is_student" id="is_student" class="form-control">
                                <option value="0">No</option></option>
                                <option value="1">Yes</option>
                            </select>

                            @error('is_student')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div id="studentInfo">
                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-left">{{ __('Course') }}</label>

                            <div class="col-md-6">
                                <input id="course" type="text" class="form-control @error('course') is-invalid @enderror" name="course" value="{{ old('course') }}" autocomplete="course">
                                @error('course')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                    </div>
                    <div id="workingInfo">
                        <div class="form-group row">
                            <label for="occupation" class="col-md-4 col-form-label text-md-left">{{ __('Occupation') }}</label>

                            <div class="col-md-6">
                                <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}" autocomplete="occupation">
                                @error('occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }}</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            @error('terms_and_conditions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="checkbox" name="terms_and_conditions">
                            I have read and understood the PITHAYA, agree to all that is
                            stated in it. I am also aware that my failure to adhere to the stipulations of the PITHAYA can be grounds for my
                            my non-acceptance into the organization</em>


                        </div>

                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
