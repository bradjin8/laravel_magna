<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Magna Virtual Showroom</title>
    <link href="{{url('/public/front')}}/img/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="{{url('/public/front')}}/css/style.css">
    <style type="text/css">
        html {
            overflow: hidden;
        }

        body {
            opacity: 1;
            font-family: "Helvetica Neue", sans-serif;
            background-color: #f7f7f7;
        }

        .intro-container {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: auto;
            overflow-x: hidden;
        }

        .intro-page {
            width: 880px;
            height: 600px;
            background: white;
        }

        .intro-page .left {
            width: 280px;
            height: 600px;
            float: left;
            margin-right: 48px;
        }

        .intro-page .right {
            margin: 48px;
        }

        .intro-page .right h2 {
            font-size: 20px;
            color: #3a3a3a;
            padding-bottom: 18px;
            font-weight: 400;
            line-height: 26px;
        }

        .intro-page .right label, .intro-page .right p {
            color: #3a3a3a;
        }

        .intro-page .left img:nth-child(1) {
            height: 48px;
            margin: 28px;
        }

        .intro-page .left img:nth-child(2) {
            width: 100%;
            height: 492px;
            object-fit: cover;
        }

        .check {
            width: 260px;
            float: left;
            margin-bottom: 16px;
            font-size: 13px;
            padding: 0 45px;
        }

        .button {
            margin-top: 0px;
        }

        @media screen and (max-width: 1024px) {
            .intro-page .left {
                display: none;
            }
        }

        @media screen and (max-height: 600px) {
            .intro-container {
                display: block;
            }

            .intro-page {
                margin: 0 auto;
                margin-top: -48px;
            }

            .intro-page .right {
                padding-top: 48px;
                top: 0;
            }
        }

        #intro-video-first, #intro-video-second {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            cursor: default;
        }

        .intro-container, #intro-video-first, #intro-video-second {
            opacity: 0;
            display: none;
        }

        select {
            appearance: none;
            background-color: #F7F7F7;
            padding: 0 10px;
            border: 0 !important;
        }

    </style>
</head>
<body>
<video id="intro-video-first" muted>
    <source src="{{url('/public/front/media')}}/magna-intro.mp4" type="video/mp4">
</video>
<video id="intro-video-second" muted>
    <source src="{{url('/public/front/media')}}/magna-fly-up.mp4" type="video/mp4">
</video>

<div id="intro-form" class="intro-container">
    <div class="intro-page">
        <div class="left">
            <img src="{{url('/public/front')}}/img/magna-logo.png">
            <img src="{{url('/public/front')}}/img/registration_form.png">
        </div>
        <div class="right">
            <form action="{{url('/')}}/" method="post" id="register">
                {{ csrf_field() }}
                <h2>Please complete the form below before entering the Magna Virtual Showroom</h2>
                <p>What is your relationship with Magna?</p>
                <select id="relationship-to-magna" name="relationship">
                    <option value="" disabled selected>Select a Relationship</option>
                    <option>Customer</option>
                    <option>Investor</option>
                    <option>Journalist</option>
                    <option>Employee</option>
                    <option>Interested in working for Magna</option>
                    <option>Just curious</option>
                </select>
                <p>Where are you from?</p>
                <select id="billing_country" name="country" autocomplete="country">
                    <option value="" disabled selected>Select a Country</option>
                    <option value="US">United States (US)</option>
                    <option value="AX">Åland Islands</option>
                    <option value="AF">Afghanistan</option>
                    <option value="AL">Albania</option>
                    <option value="DZ">Algeria</option>
                    <option value="AS">American Samoa</option>
                    <option value="AD">Andorra</option>
                    <option value="AO">Angola</option>
                    <option value="AI">Anguilla</option>
                    <option value="AQ">Antarctica</option>
                    <option value="AG">Antigua and Barbuda</option>
                    <option value="AR">Argentina</option>
                    <option value="AM">Armenia</option>
                    <option value="AW">Aruba</option>
                    <option value="AU">Australia</option>
                    <option value="AT">Austria</option>
                    <option value="AZ">Azerbaijan</option>
                    <option value="BS">Bahamas</option>
                    <option value="BH">Bahrain</option>
                    <option value="BD">Bangladesh</option>
                    <option value="BB">Barbados</option>
                    <option value="BY">Belarus</option>
                    <option value="PW">Belau</option>
                    <option value="BE">Belgium</option>
                    <option value="BZ">Belize</option>
                    <option value="BJ">Benin</option>
                    <option value="BM">Bermuda</option>
                    <option value="BT">Bhutan</option>
                    <option value="BO">Bolivia</option>
                    <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                    <option value="BA">Bosnia and Herzegovina</option>
                    <option value="BW">Botswana</option>
                    <option value="BV">Bouvet Island</option>
                    <option value="BR">Brazil</option>
                    <option value="IO">British Indian Ocean Territory</option>
                    <option value="BN">Brunei</option>
                    <option value="BG">Bulgaria</option>
                    <option value="BF">Burkina Faso</option>
                    <option value="BI">Burundi</option>
                    <option value="KH">Cambodia</option>
                    <option value="CM">Cameroon</option>
                    <option value="CA">Canada</option>
                    <option value="CV">Cape Verde</option>
                    <option value="KY">Cayman Islands</option>
                    <option value="CF">Central African Republic</option>
                    <option value="TD">Chad</option>
                    <option value="CL">Chile</option>
                    <option value="CN">China</option>
                    <option value="CX">Christmas Island</option>
                    <option value="CC">Cocos (Keeling) Islands</option>
                    <option value="CO">Colombia</option>
                    <option value="KM">Comoros</option>
                    <option value="CG">Congo (Brazzaville)</option>
                    <option value="CD">Congo (Kinshasa)</option>
                    <option value="CK">Cook Islands</option>
                    <option value="CR">Costa Rica</option>
                    <option value="HR">Croatia</option>
                    <option value="CU">Cuba</option>
                    <option value="CW">Curaçao</option>
                    <option value="CY">Cyprus</option>
                    <option value="CZ">Czech Republic</option>
                    <option value="DK">Denmark</option>
                    <option value="DJ">Djibouti</option>
                    <option value="DM">Dominica</option>
                    <option value="DO">Dominican Republic</option>
                    <option value="EC">Ecuador</option>
                    <option value="EG">Egypt</option>
                    <option value="SV">El Salvador</option>
                    <option value="GQ">Equatorial Guinea</option>
                    <option value="ER">Eritrea</option>
                    <option value="EE">Estonia</option>
                    <option value="ET">Ethiopia</option>
                    <option value="FK">Falkland Islands</option>
                    <option value="FO">Faroe Islands</option>
                    <option value="FJ">Fiji</option>
                    <option value="FI">Finland</option>
                    <option value="FR">France</option>
                    <option value="GF">French Guiana</option>
                    <option value="PF">French Polynesia</option>
                    <option value="TF">French Southern Territories</option>
                    <option value="GA">Gabon</option>
                    <option value="GM">Gambia</option>
                    <option value="GE">Georgia</option>
                    <option value="DE">Germany</option>
                    <option value="GH">Ghana</option>
                    <option value="GI">Gibraltar</option>
                    <option value="GR">Greece</option>
                    <option value="GL">Greenland</option>
                    <option value="GD">Grenada</option>
                    <option value="GP">Guadeloupe</option>
                    <option value="GU">Guam</option>
                    <option value="GT">Guatemala</option>
                    <option value="GG">Guernsey</option>
                    <option value="GN">Guinea</option>
                    <option value="GW">Guinea-Bissau</option>
                    <option value="GY">Guyana</option>
                    <option value="HT">Haiti</option>
                    <option value="HM">Heard Island and McDonald Islands</option>
                    <option value="HN">Honduras</option>
                    <option value="HK">Hong Kong</option>
                    <option value="HU">Hungary</option>
                    <option value="IS">Iceland</option>
                    <option value="IN">India</option>
                    <option value="ID">Indonesia</option>
                    <option value="IR">Iran</option>
                    <option value="IQ">Iraq</option>
                    <option value="IE">Ireland</option>
                    <option value="IM">Isle of Man</option>
                    <option value="IL">Israel</option>
                    <option value="IT">Italy</option>
                    <option value="CI">Ivory Coast</option>
                    <option value="JM">Jamaica</option>
                    <option value="JP">Japan</option>
                    <option value="JE">Jersey</option>
                    <option value="JO">Jordan</option>
                    <option value="KZ">Kazakhstan</option>
                    <option value="KE">Kenya</option>
                    <option value="KI">Kiribati</option>
                    <option value="KW">Kuwait</option>
                    <option value="KG">Kyrgyzstan</option>
                    <option value="LA">Laos</option>
                    <option value="LV">Latvia</option>
                    <option value="LB">Lebanon</option>
                    <option value="LS">Lesotho</option>
                    <option value="LR">Liberia</option>
                    <option value="LY">Libya</option>
                    <option value="LI">Liechtenstein</option>
                    <option value="LT">Lithuania</option>
                    <option value="LU">Luxembourg</option>
                    <option value="MO">Macao</option>
                    <option value="MG">Madagascar</option>
                    <option value="MW">Malawi</option>
                    <option value="MY">Malaysia</option>
                    <option value="MV">Maldives</option>
                    <option value="ML">Mali</option>
                    <option value="MT">Malta</option>
                    <option value="MH">Marshall Islands</option>
                    <option value="MQ">Martinique</option>
                    <option value="MR">Mauritania</option>
                    <option value="MU">Mauritius</option>
                    <option value="YT">Mayotte</option>
                    <option value="MX">Mexico</option>
                    <option value="FM">Micronesia</option>
                    <option value="MD">Moldova</option>
                    <option value="MC">Monaco</option>
                    <option value="MN">Mongolia</option>
                    <option value="ME">Montenegro</option>
                    <option value="MS">Montserrat</option>
                    <option value="MA">Morocco</option>
                    <option value="MZ">Mozambique</option>
                    <option value="MM">Myanmar</option>
                    <option value="NA">Namibia</option>
                    <option value="NR">Nauru</option>
                    <option value="NP">Nepal</option>
                    <option value="NL">Netherlands</option>
                    <option value="NC">New Caledonia</option>
                    <option value="NZ">New Zealand</option>
                    <option value="NI">Nicaragua</option>
                    <option value="NE">Niger</option>
                    <option value="NG">Nigeria</option>
                    <option value="NU">Niue</option>
                    <option value="NF">Norfolk Island</option>
                    <option value="KP">North Korea</option>
                    <option value="MK">North Macedonia</option>
                    <option value="MP">Northern Mariana Islands</option>
                    <option value="NO">Norway</option>
                    <option value="OM">Oman</option>
                    <option value="PK">Pakistan</option>
                    <option value="PS">Palestinian Territory</option>
                    <option value="PA">Panama</option>
                    <option value="PG">Papua New Guinea</option>
                    <option value="PY">Paraguay</option>
                    <option value="PE">Peru</option>
                    <option value="PH">Philippines</option>
                    <option value="PN">Pitcairn</option>
                    <option value="PL">Poland</option>
                    <option value="PT">Portugal</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="QA">Qatar</option>
                    <option value="RE">Reunion</option>
                    <option value="RO">Romania</option>
                    <option value="RU">Russia</option>
                    <option value="RW">Rwanda</option>
                    <option value="ST">São Tomé and Príncipe</option>
                    <option value="BL">Saint Barthélemy</option>
                    <option value="SH">Saint Helena</option>
                    <option value="KN">Saint Kitts and Nevis</option>
                    <option value="LC">Saint Lucia</option>
                    <option value="SX">Saint Martin (Dutch part)</option>
                    <option value="MF">Saint Martin (French part)</option>
                    <option value="PM">Saint Pierre and Miquelon</option>
                    <option value="VC">Saint Vincent and the Grenadines</option>
                    <option value="WS">Samoa</option>
                    <option value="SM">San Marino</option>
                    <option value="SA">Saudi Arabia</option>
                    <option value="SN">Senegal</option>
                    <option value="RS">Serbia</option>
                    <option value="SC">Seychelles</option>
                    <option value="SL">Sierra Leone</option>
                    <option value="SG">Singapore</option>
                    <option value="SK">Slovakia</option>
                    <option value="SI">Slovenia</option>
                    <option value="SB">Solomon Islands</option>
                    <option value="SO">Somalia</option>
                    <option value="ZA">South Africa</option>
                    <option value="GS">South Georgia/Sandwich Islands</option>
                    <option value="KR">South Korea</option>
                    <option value="SS">South Sudan</option>
                    <option value="ES">Spain</option>
                    <option value="LK">Sri Lanka</option>
                    <option value="SD">Sudan</option>
                    <option value="SR">Suriname</option>
                    <option value="SJ">Svalbard and Jan Mayen</option>
                    <option value="SZ">Swaziland</option>
                    <option value="SE">Sweden</option>
                    <option value="CH">Switzerland</option>
                    <option value="SY">Syria</option>
                    <option value="TW">Taiwan</option>
                    <option value="TJ">Tajikistan</option>
                    <option value="TZ">Tanzania</option>
                    <option value="TH">Thailand</option>
                    <option value="TL">Timor-Leste</option>
                    <option value="TG">Togo</option>
                    <option value="TK">Tokelau</option>
                    <option value="TO">Tonga</option>
                    <option value="TT">Trinidad and Tobago</option>
                    <option value="TN">Tunisia</option>
                    <option value="TR">Turkey</option>
                    <option value="TM">Turkmenistan</option>
                    <option value="TC">Turks and Caicos Islands</option>
                    <option value="TV">Tuvalu</option>
                    <option value="UG">Uganda</option>
                    <option value="UA">Ukraine</option>
                    <option value="AE">United Arab Emirates</option>
                    <option value="GB">United Kingdom (UK)</option>
                    <option value="UM">United States (US) Minor Outlying Islands</option>
                    <option value="UY">Uruguay</option>
                    <option value="UZ">Uzbekistan</option>
                    <option value="VU">Vanuatu</option>
                    <option value="VA">Vatican</option>
                    <option value="VE">Venezuela</option>
                    <option value="VN">Vietnam</option>
                    <option value="VG">Virgin Islands (British)</option>
                    <option value="VI">Virgin Islands (US)</option>
                    <option value="WF">Wallis and Futuna</option>
                    <option value="EH">Western Sahara</option>
                    <option value="YE">Yemen</option>
                    <option value="ZM">Zambia</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
                <p>How did you hear about the site?</p>
                <select id="how-hear" name="how">
                    <option disabled selected>Select an Option</option>
                    <option value="I follow Magna on social media">I follow Magna on social media</option>
                    <option value="A friend shared it with me">A friend shared it with me</option>
                    <option value="Magna.com">Magna.com</option>
                    <option value="Internal Magna communication">Internal Magna communication</option>
                </select>
                <div>
                    <label class="check">Use Of And/Or Registration On Any Portion Of This Site Constitutes Acceptance
                        Of
                        Our <a href="https://www.magna.com/privacy">Privacy Policy</a><input id="privacy-policy-check"
                                                                                             type="checkbox"><span
                                class="checkSpan"></span></label>
                    <span id="intro-btn-submit" class="button disabled">Submit</span>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript">
    jQuery('#intro-video-first').css('display', 'initial')
    jQuery('#intro-video-first').css('opacity', 0)
    jQuery('#intro-video-first').fadeTo(360, 1)
    document.querySelector('#intro-video-first').play()
    document.querySelector('#intro-video-first').addEventListener('ended', () => {
        jQuery('#intro-video-first').css('display', 'none')
        jQuery('#intro-form').css('display', 'flex')
        jQuery('#intro-form').fadeTo(360, 1)
    }, false)

    const btnSubmit = document.querySelector('#intro-btn-submit')
    const onInputChange = () => {
        if (document.querySelector('#relationship-to-magna').value == '' || document.querySelector('#billing_country').value == '' || document.querySelector('#privacy-policy-check').checked == false) {
            btnSubmit.classList.add('disabled')
            btnSubmit.onclick = () => {
            }
        } else {
            btnSubmit.classList.remove('disabled')
            btnSubmit.onclick = () => {
                jQuery('#intro-form').fadeTo(360, 0, () => {
                    jQuery('#intro-form').css('opacity', 0)
                    jQuery('#intro-form').css('display', 'none')
                    jQuery('#intro-video-second').css('display', 'initial')
                    jQuery('#intro-video-second').css('opacity', 0)
                    jQuery('#intro-video-second').fadeTo(360, 1)
                    document.querySelector('#intro-video-second').play()
                    document.querySelector('#intro-video-second').addEventListener('ended', () => {
                        // window.location = "{{url('/')}}/showroom";
                        jQuery('#register').submit();
                    }, false)
                })
            }
        }
    }
    document.querySelector('#relationship-to-magna').onchange = onInputChange
    document.querySelector('#billing_country').onchange = onInputChange
    document.querySelector('#privacy-policy-check').onchange = onInputChange
</script>
</body>
</html>
