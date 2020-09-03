const template = ' \
<div class="info-popup"> \
  <div class="first" > \
    <div class="top"> \
      <a href=""> \
        <img src="/public/front/img/magna-logo.png" class="main-logo"> \
      </a> \
      <img src="/public/front/img/close-blk.png" class="close"> \
    </div> \
    <div class="center"> \
      <div class="content"> \
        <h1>_TITLE_A_</h1> \
        <h2>_SUBTITLE_A_</h2> \
        <p>_DESC_A_</p> \
        <span class="moreInfoButton button">Receive More Info</span> \
      </div> \
    </div> \
  </div> \
  <div class="second"> \
    <div class="top"> \
      <a href=""> \
        <img src="/public/front/img/magna-logo.png" class="main-logo" /> \
      </a> \
      <img src="/public/front/img/close-blk.png" class="close" /> \
    </div> \
    <div class="content"> \
      <div class="col1" style="background: url(\'__BG_IMG_B_\') top left; background-size: cover;"> \
        <div class="colContent"> \
          <h2>_TITLE_B_</h2> \
          <input type="text" placeholder="First Name"> \
          <input type="text" placeholder="Last Name"> \
          <br /> \
          <div> \
              <input type="text" placeholder="Company" style="width: 100%;"> \
          </div> \
          <div class="select"> \
            <label>Job Function</label> \
            <select id="function" name="function" >_FUNCTIONS_B_</select> \
          </div> \
          <div> \
              <input type="text" placeholder="Job Title" style="width: 100%;"> \
          </div> \
          <div> \
              <input type="text" placeholder="Email" style="width: 100%;"> \
          </div> \
          <div class="select"> \
            <label>Country</label> \
            <select id="billing_country" name="country" autocomplete="country"><option value="" disabled selected>Country &amp; Region</option><option value="US">United States (US)</option><option value="AX">Åland Islands</option><option value="AF">Afghanistan</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="PW">Belau</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BQ">Bonaire, Saint Eustatius and Saba</option><option value="BA">Bosnia and Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo (Brazzaville)</option><option value="CD">Congo (Kinshasa)</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CW">Curaçao</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island and McDonald Islands</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="CI">Ivory Coast</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="KP">North Korea</option><option value="MK">North Macedonia</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PS">Palestinian Territory</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="RW">Rwanda</option><option value="ST">São Tomé and Príncipe</option><option value="BL">Saint Barthélemy</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="SX">Saint Martin (Dutch part)</option><option value="MF">Saint Martin (French part)</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia/Sandwich Islands</option><option value="KR">South Korea</option><option value="SS">South Sudan</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom (UK)</option><option value="UM">United States (US) Minor Outlying Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="VG">Virgin Islands (British)</option><option value="VI">Virgin Islands (US)</option><option value="WF">Wallis and Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select> \
          </div> \
          <br /> \
        </div> \
      </div> \
      <div class="col2"> \
        <div class="colContent"> \
          <h2>Please select the technologies which you would like more information on: </h2> \
          _TECHS_B_ \
          <!-- <span class="button close">Submit</span> --> \
        </div> \
      </div> \
    </div> \
  </div> \
</div> \
'


const function_template = '<option value="_F_VALUE_">_F_NAME_</option>',
      tech_template_checked = '<label class="check">_T_NAME_<input type="checkbox" checked><span class="checkSpan"></span></label>',
      tech_template = '<label class="check">_T_NAME_<input type="checkbox"><span class="checkSpan"></span></label>',
      tech_template_pdf = '<div><a href="_T_PDF_" download><img class="download-icon">_T_NAME_</a></div>',
      container = document.querySelector('#popup-container')

function addPdfPopup(data) {
    let functions = ''
    functions += '<option value="" disabled selected>Job Function</option>'
    let techs = ''
    for (let _f of data.functions_b)
      functions += function_template.replace('_F_VALUE_', _f).replace('_F_NAME_', _f)
    // for (let _t of data.techs_b)
    //   techs += tech_template.replace('_T_NAME_', _t)
    for (let i = 0; i < data.techs_b.length; i++)
      if (data.techs_b_pdf && data.techs_b_pdf.length > i)
        techs += tech_template_pdf.replace('_T_NAME_', data.techs_b[i]).replace('_T_PDF_', data.techs_b_pdf[i])
    let html = template
        .replace('_TITLE_A_', data.title_a)
        .replace('_SUBTITLE_A_', data.subtitle_a)
        .replace('_DESC_A_', data.desc_a)
        .replace('_TITLE_B_', data.title_b)
        .replace('_FUNCTIONS_B_', functions)
        .replace('_TECHS_B_', techs)
        .replace('__BG_IMG_B_', data.bg_img_b)
    container.innerHTML = html
}


function showPdfPopup(data) {
    addPdfPopup(data)
    $(".close").click(() => {
      $(".infoButton").fadeIn( "fast", () => {})
      $(".info-popup .first").fadeOut( "fast", () => {})
      $(".info-popup .second").fadeOut( "fast", () => {})
      $(".info-popup").fadeOut( "fast", () => {})
    })
    $(".moreInfoButton").click(() => {
      $( ".info-popup .first" ).fadeOut( "fast", () => {})
      $( ".info-popup .second" ).fadeIn( "slow", () => {})
    })
    $(".info-popup").addClass("overlayFullOn")
    $(".info-popup").fadeIn( "fast")
    $(".infoButton").fadeOut( "fast")
    $(".info-popup .first").fadeIn( "fast")
}

const info_template = ' \
<div class="info-popup info-popup-pano"> \
  <div class="first" > \
    <div class="top"> \
      <a href=""> \
        <img src="/public/front/img/magna-logo.png" class="main-logo"> \
      </a> \
      <img src="/public/front/img/close-blk.png" class="close"> \
    </div> \
    <div class="center"> \
      <div class="content"> \
        <h1>_TITLE_</h1> \
        _ITEMS_ \
      </div> \
    </div> \
  </div> \
</div> \
'

function addInfoPopup(data) {
  let html = info_template
    .replace('_TITLE_', data.title)
  let items = ''
  for (let item of data.items)
    items += '<div><img src="' + item[0] + '"><span>' + item[1] + '</span></div>'
  html = html.replace('_ITEMS_', items)

  container.innerHTML = html
}


function showInfoPopup(data) {
    addInfoPopup(data)
    $(".close").click(() => {
      $(".infoButton").fadeIn( "fast", () => {})
      $(".info-popup .first").fadeOut( "fast", () => {})
      $(".info-popup").fadeOut( "fast", () => {})
    })
    $(".info-popup").addClass("overlayFullOn")
    $(".info-popup").fadeIn( "fast")
    $(".infoButton").fadeOut( "fast")
    $(".info-popup .first").fadeIn( "fast")
}
