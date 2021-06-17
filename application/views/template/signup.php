<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/signup.css">
    <style>
       
    </style>
</head>

<body>
    <div class="container col-8">
        <div class="container col-8">
            <div class="form">
                <div class="contact-info">
                    <h3 class="title">Let's get in touch</h3>
                    <p class="text"> Contact us with the following details. and fillup the form with the details. </p>
                    <div class="info">
                        <div class="social-information"> <i class="fa fa-map-marker"></i>
                            <p>RCA,Nyabihu District</p>
                        </div>
                        <div class="social-information"> <i class="fa fa-envelope-o"></i>
                            <p>carrental@gmail.com</p>
                        </div>
                        <div class="social-information"> <i class="fa fa-mobile-phone"></i>
                            <p>+250 7745990 </p>
                        </div>
                    </div>
                    <div class="social-media">
                        <p>Connect with us :</p>
                        <div class="social-icons"> <a href="#"> <i class="fa fa-facebook-f"></i> </a> <a href="#"> <i class="fa fa-twitter"></i> </a> <a href="#"> <i class="fa fa-instagram"></i> </a> <a href="#"> <i class="fa fa-linkedin"></i> </a> </div>
                    </div>
                </div>
        <div class="contact-info-form">
        <span class="circle one"></span> <span class="circle two"></span>
            <form action="<?=base_url('usersController/checkValildation');?>" autocomplete="off" method="post">
                <h3 class="title">Join Us</h3>
                <div class="social-input-containers"> 
                <input type="text" name="name" class="input" placeholder="Name" value="<?= set_value('name')?>" /> 
                <?= form_error('name')?>
                </div>
                <div class="social-input-containers"> 
                <input type="email" name="email" class="input" placeholder="Email" value="<?= set_value('email')?>"  />
                <?= form_error('email')?>
                 </div>
                <div class="social-input-containers"> 
                <input type="text" name="phone" class="input" placeholder="Phone" value="<?= set_value('phone')?>"  />
                <?= form_error('phone')?>
                </div>
                <div class="social-input-containers"> 
                <input type="text" name="username" class="input select" placeholder="username" value="<?= set_value('username')?>" />
                <?= form_error('username')?>
                </div>
							 <div class="social-input-containers">
                            <select name="district" class="input" id="district">
                                <option value="">--Select District--</option>
                                <?php foreach ($districts as $district): ?>
                                    <option value="<?= $district->districtId ?>"><?= $district->districtName ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('district') ?>
                        </div>
                        <div class="social-input-containers">
                            <select name="sector" class="input" id="sector">
                                <option value="">--Select Sector--</option>
                                <?php foreach ($sectors as $sector): ?>
                                    <option value="<?= $sector->sectorId ?>"><?= $sector->sectorName ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('sector') ?>
                        </div>
                <div class="social-input-containers"> 
                <input type="password" name="pswd" class="input" placeholder="Password" value="<?= set_value('pswd')?>" />
                <?= form_error('pswd')?>
                </div>
                <input type="submit" value="Send" class="btn" />
            </form>
        </div>
    </div>
</div>

</body>
</html>
	
	<script>
        let district = document.querySelector('#district'),
         sector = document.querySelector('#sector');
        district.onchange = function() {
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    sector.innerHTML = this.responseText;
                    console.log("seen");
                }
            }
            xmlhttp.open('GET', "<?=base_url('usersController/retrieve_data?id=')?>" + this.value, true)
            xmlhttp.send();
        }
        sector.onchange = function() {
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    district.innerHTML = this.responseText;
                }
            }
            xmlhttp.open('GET', "<?=base_url('usersController/retrieve_district?id=')?>" + this.value, true)
            xmlhttp.send();
            console.log("seen");
        }
    </script>
