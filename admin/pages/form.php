<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>form</title>

    <style type="text/css">
        /* your CSS goes here*/
 body {
    background: #eee
}

#regForm {
    background-color: #ffffff;
    margin: 0px auto;
    font-family: Raleway;
    padding: 40px;
    border-radius: 10px
}

h1 {
    text-align: center
}

input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa
}

input.invalid {
    background-color: #ffdddd
}

.tab {
    display: none
}

button {
    background-color: #4CAF50;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer
}

button:hover {
    opacity: 0.8
}

#prevBtn {
    background-color: #bbbbbb
}

.step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5
}

.step.active {
    opacity: 1
}

.step.finish {
    background-color: #4CAF50
}

.all-steps {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px
}

.thanks-message {
    display: none
}

.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}


/* Hide the browser's default radio button */

.container input[type="radio"] {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}


/* Create a custom radio button */

.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
}


/* On mouse-over, add a grey background color */

.container:hover input~.checkmark {
    background-color: #ccc;
}


/* When the radio button is checked, add a blue background */

.container input:checked~.checkmark {
    background-color: #2196F3;
}


/* Create the indicator (the dot/circle - hidden when not checked) */

.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}


/* Show the indicator (dot/circle) when checked */

.container input:checked~.checkmark:after {
    display: block;
}


/* Style the indicator (dot/circle) */

.container .checkmark:after {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
}
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <form id="regForm">
                <h1 id="register">Donate</h1>
                <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span> <span class="step"></span> <span class="step"></span> </div>
                <div class="tab">
                    <h3>Donation Type:</h3>
                    <label class="container">One time
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                    </label>
                    <label class="container">Recurring
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                    </label>
                    <p><input type="text" placeholder="Amount" oninput="this.className = ''" name="amount"></p>

                </div>
                <div class="tab">
                    <p><input placeholder="First Name" oninput="this.className = ''" name="first"></p>
                    <p><input placeholder="Last Name" oninput="this.className = ''" name="last"></p>
                    <p><input placeholder="Email" oninput="this.className = ''" name="email"></p>
                    <p><input placeholder="Phone" oninput="this.className = ''" name="phone"></p>
                    <p><input placeholder="Street Address" oninput="this.className = ''" name="address"></p>
                    <p><input placeholder="City" oninput="this.className = ''" name="city"></p>
                    <p><input placeholder="State" oninput="this.className = ''" name="state"></p>
                    <p><input placeholder="Country" oninput="this.className = ''" name="country"></p>

                </div>
                <div class="tab">
                    <p><input placeholder="Credit Card #" oninput="this.className = ''" name="email"></p>
                    <p>Exp Month
                        <select id="month">
    <option value="1">January</option>
    <option value="2">February</option>
    <option value="3">March</option>
    <option value="4">April</option>
    <option value="5">May</option>
    <option value="6">June</option>
    <option value="7">July</option>
    <option value="8">August</option>
    <option value="9">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
</select></p>
                    <p>Exp Year
                        <select id="year">
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
</select></p>

                    <p><input placeholder="CVV" oninput="this.className = ''" name="phone"></p>
                </div>

                <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                    <h3>Thanks for your Donation!</h3> <span>Your donation has been entered! We will contact you shortly!</span>
                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>


<script type="text/javascript">
    //your javascript goes here
var currentTab = 0;
document.addEventListener("DOMContentLoaded", function(event) {


    showTab(currentTab);

});

function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    fixStepIndicator(n)
}

function nextPrev(n) {
    var x = document.getElementsByClassName("tab");
    if (n == 1 && !validateForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    if (currentTab >= x.length) {
        // document.getElementById("regForm").submit();
        // return false;
        //alert("sdf");
        document.getElementById("nextprevious").style.display = "none";
        document.getElementById("all-steps").style.display = "none";
        document.getElementById("register").style.display = "none";
        document.getElementById("text-message").style.display = "block";




    }
    showTab(currentTab);
}

function validateForm() {
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    for (i = 0; i < y.length; i++) {
        if (y[i].value == "") {
            y[i].className += " invalid";
            valid = false;
        }
    }
    if (valid) { document.getElementsByClassName("step")[currentTab].className += " finish"; }
    return valid;
}

function fixStepIndicator(n) {
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) { x[i].className = x[i].className.replace(" active", ""); }
    x[n].className += " active";
}
</script>
</html>