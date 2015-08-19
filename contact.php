<?php include("INCLUDE/header.php"); ?> 
<script> function formCheck(formobj) {
		// Enter name of mandatory fields
		var fieldRequired = Array("name", "phone", "email");
		// Enter field description to appear in the dialog box
		var fieldDescription = Array("Name", "Phone Number", "Email");
		// dialog message
		var alertMsg = "Please complete the following fields:\n";
		var l_Msg = alertMsg.length;
		for (var i = 0; i < fieldRequired.length; i++) {
			var obj = formobj.elements[fieldRequired[i]];
			//alert(obj.type);
			if (obj) {
				switch (obj.type) {
					case "select-one":
						if (obj.selectedIndex == 0 || obj.options[obj.selectedIndex].text == "") {
							alertMsg += " - " + fieldDescription[i] + "\n";
						}
						break;
					case "select-multiple":
						if (obj.selectedIndex == -1) {
							alertMsg += " - " + fieldDescription[i] + "\n";
						}
						break;
					case "text":
					case "textarea":
						if (obj.value == "" || obj.value == null) {
							alertMsg += " - " + fieldDescription[i] + "\n";
						}
						break;
					default:
				}
				if (obj.type == undefined) {
					var blnchecked = false;
					for (var j = 0; j < obj.length; j++) {
						if (obj[j].checked) {
							blnchecked = true;
						}
					}
					if (!blnchecked) {
						alertMsg += " - " + fieldDescription[i] + "\n";
					}
				}
			}
		}
		if (alertMsg.length == l_Msg) {
			return true;
		} else {
			alert(alertMsg);
			return false;
		}
	}
	// -->
	</script><!-- End Preload Script -->
<style>
#product-description-contact {
	position:relative;
	float:left;
	top: 40px; 
	left:8%;
	width: 85%;
}
#form-container {
	float: left;
	position:relative;
	clear: left;
	left: 8%;
	top: 10px;
	display: block;
	width:85%;
	}
ul.product-specs-contact {
	font: 22px Palatino Linotype, serif;
	list-style-type: none;
	
}
#form-title {
	font-weight: bold;
	margin-left: -10%;
	font-size: 95%;
}
#form-container ul li, #product-description-contact ul li {
	text-indent: 10%;
}
li.contact-title {
	font-size: 103%;
	font-weight: bold;
	margin-left: -10%;
}
.list-item-first {
	margin-top: 3%;
}
li.form-title, #form-title-two {
	font-size: 95%;
}
.form-input {
	width: 200px;
}
#list-company-info {
	color: #2a5bbd;
	margin-top: -3.5%;
}
#color-wrapper-contact {
	top: 5%;
	left: 5%;
	right: 5%;
	position: absolute;
	height: 58.5em;
	margin-bottom: 5%;
	background: #69b0e3;
	border-radius: 10px;
	border: 1px solid #666;
	box-shadow: .2em .2em .5em #999;

}
#main-wrapper-contact {
	position: relative;
	float: left;
	clear: both;
	height: 65em;
	width: 100%;
}
#master-container-for-form{float:left; position:relative; width: 70%; }
#contact-title1{font-size: 120%; top:1%;}
#product-description-contact ul li {clear: both;}
#form-container ul li {clear:both;}

label { float: left;
		width: 6em;
		text-align:left;
				}
input.form-input{width: 20em;
  height: 2em;
  border: 1px solid #666;
  margin-top: 10px;
}
textarea {width: 30em; margin-top: 10px; border-color:black;}
#button-submit{-webkit-appearance: button; color:#2a5bbd;  width: 80px;  font-size:15px; }
#map {float: left; left: -19%; top: 5%; width: 30%; position:relative; } 


</style>

<!--ISAAC- I put the style information here in the head of the document on this page b/c of its uniqueness; I did the same thing with the index page. -->
<div id="main-wrapper-contact">

  <!--HOLDER FOR ALL CONTACT INFO ON THE PAGE BEGINNING TAG-->
  <div id="color-wrapper-contact">
  <!--HOLDER FOR ALL CONTACT INFO ON THE PAGE BEGINNING TAG ENDS--> 
   
    <!--HOLDER FOR CONTACT US INFO ON THE LEFT OF THE PAGE-OPENING DIV TAG-->
    <div id="master-container-for-form">
    <!--HOLDER FOR CONTACT US INFO ON THE LEFT OF THE PAGE-END OF OPENING DIV TAG-->
     
     <!--HOLDER FOR ROBECO CONTACT-OPENING DIV TAG--> 
     <div id="product-description-contact">
      <!--HOLDER FOR ROBECO CONTACT-END OF OPENING DIV TAG--> 
        <ul class ="product-specs-contact" >
          <li class="contact-title" id="contact-title1">Contact Us:</li>
          <li class="list-item-first">Robeco</li>
          <li>100 Ring Road West</li>
          <li>Garden City, NY 11530</li>
          <li>Phone: (516) 248-1521</li>
          <li>Fax: (516) 248-1524</li>
          <li>Toll Free:  800 992 1067</li>
          <li><a href="mailto:sales@robecoinc.com" class="mail-link">sales@robecoinc.com</a></li>
        </ul>
      </div>
      <!--HOLDER FOR ROBECO CONTACT INFO ENDS-->
      
      <!--HOLDER FOR FORM INFO BEGINS-->
        <div id="form-container">
        <!--FORM BEGINS-->
      <form action="sendmail.php" method="post" onSubmit="return formCheck(this)">
        <ul class ="product-specs-contact">
            <li class="contact-title" id="form-title">or send us a message to request</li>
            <li class="contact-title" id="form-title-two">information or samples:</li>
            <li class="list-item-first">
        <!--LABEL FOR FORM NAME --><label for="form-name"> Name: </label>
              <input name="Name" class="form-input" id="form-name">
            </li>
            <li>
         <!--LABEL FOR FORM EMAIL --><label for="form-email"> Email:</label>
              <input name="Email" class="form-input" id="form-email">
            </li>
            
            <li> 
         <!--LABEL FOR COMPANY STREET NAME --><label for="form-address"> Address: </label>
              <input name="Address" class="form-input" id="form-address">
            </li>
            <li>
         <!--LABEL FOR COMPANY CITY --><label for="form-city">City:</label>
              <input name="City" class="form-input" id="form-city">
            </li>
            <li>
            <!--LABEL FOR COMPANY STATES--><label for="State">State:</label>
              <select name="State">
                <option value="NY">NY</option>
                <option value="">--</option>
                <option value="AL">AL</option>
                <option value="AK">AK</option>
                <option value="AZ">AZ</option>
                <option value="AR">AR</option>
                <option value="CA">CA</option>
                <option value="CO">CO</option>
                <option value="CT">CT</option>
                <option value="DC">DC</option>
                <option value="DE">DE</option>
                <option value="FL">FL</option>
                <option value="GA">GA</option>
                <option value="HI">HI</option>
                <option value="ID">ID</option>
                <option value="IL">IL</option>
                <option value="IN">IN</option>
                <option value="IA">IA</option>
                <option value="KS">KS</option>
                <option value="KY">KY</option>
                <option value="LA">LA</option>
                <option value="ME">ME</option>
                <option value="MD">MD</option>
                <option value="MA">MA</option>
                <option value="MI">MI</option>
                <option value="MN">MN</option>
                <option value="MS">MS</option>
                <option value="MO">MO</option>
                <option value="MT">MT</option>
                <option value="NE">NE</option>
                <option value="NV">NV</option>
                <option value="NH">NH</option>
                <option value="NJ">NJ</option>
                <option value="NM">NM</option>
                <option value="NY">NY</option>
                <option value="NC">NC</option>
                <option value="ND">ND</option>
                <option value="OH">OH</option>
                <option value="OK">OK</option>
                <option value="OR">OR</option>
                <option value="PA">PA</option>
                <option value="RI">RI</option>
                <option value="SC">SC</option>
                <option value="SD">SD</option>
                <option value="TN">TN</option>
                <option value="TX">TX</option>
                <option value="UT">UT</option>
                <option value="VT">VT</option>
                <option value="VA">VA</option>
                <option value="WA">WA</option>
                <option value="WV">WV</option>
                <option value="WI">WI</option>
                <option value="WY">WY</option>
              </select>
            </li>
            <li>
          <!--LABEL FOR COMPANY ZIP CODE --><label for="form-zip">Zip:</label>
              <input name="Zip" class="form-input" id="form-zip">
            </li>
            <li>
          <!--LABEL FOR COMPANY PHONE NUMBER --><label for="form-phone">Phone:</label>
              <input name="Phone" class="form-input" id="form-phone">
          </li>
            <li>
          <!--LABEL FOR COMMENTS --><label for="form-comments"> Comments: </label>
             <textarea cols="30" maxlength="400" id="form-comments" name="Message" rows="7" resize:none;></textarea>
             </li>
            
            <li><input  type="submit"  id="button-submit" value="Submit"></li>
          </ul>
        </form><!-- FORM ENDS-->
      </div><!--HOLDER FOR FORM INFO ENDS-->
    </div><!--ALL CONTACT INFO ON THE LEFT OF THE PAGE ENDS--> 
   <div id="map"><!--MAP ON THE LEFT OF THE PAGE BEGIN-->
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2940.3490350568213!2d-73.61641719747749!3d40.73961593754909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c27d7d1c88bb53%3A0xae8bdb25cf0b85f5!2s100+Ring+Rd+W%2C+Garden+City%2C+NY+11530!5e0!3m2!1sen!2sus!4v1436923622850" width="500" height="375" frameborder="0" style="border:0" allowfullscreen></iframe>
   <!--MAP ON THE LEFT OF THE PAGE END-->
	</div>
    <!--COLOR WRAPPER AND MAIN WRAPPER END-->
  </div>
</div>
<?php include("INCLUDE/footer.php"); ?>
