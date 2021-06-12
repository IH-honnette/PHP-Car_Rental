
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        body,
        input {
            font-family: "Poppins", sans-serif;
        }

        ::placeholder {
            color: #B7B7B4;
            opacity: 1;
        }

        .container {
            position: relative;
            min-height: 80vh;
            padding: 0.1rem;
            background-color: #fafafa;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
        }

        .form {
            width: 90%;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            overflow: hidden;
            display: grid;
            grid-template-columns: repeat(2, 1fr)
        }

        .contact-info-form {
            background-color: #0C113E;
            position: relative;
            width: 50%
        }

        .circle {
            border-radius: 50%;
            background: linear-gradient(135deg, transparent 20%, #5D5F65);
            position: absolute
        }

        .error {
            color: #F76B1C;
            font-size: 11px;
            font-family: FreeMono, monospace;
        }

        .circle.one {
            width: 130px;
            height: 130px;
            top: 130px;
            right: -20px
        }

        .circle.two {
            width: 80px;
            height: 80px;
            top: 10px;
            right: 33px
        }

        .contact-info-form:before {
            content: "";
            position: absolute;
            width: 30px;
            height: 26px;
            background-color: #0C113E;
            transform: rotate(45deg);
            bottom: 65px;
            left: -13px
        }

        form {
            padding: 2.3rem 2.2rem;
            z-index: 10;
            overflow: hidden;
            position: relative
        }

        .title {
            color: #fff;
            font-weight: 500;
            font-size: 1.7em;
            line-height: 1;
            margin-bottom: 7%;
            text-align: center;
        }

        .social-input-containers {
            position: relative;
            margin: 1rem 0
        }

        .input {
            width: 98%;
            outline: none;
            border: 2px solid #fafafa;
            background: none;
            padding: 0.6rem 1.2rem;
            color: #fff;
            font-weight: 500;
            font-size: 1em;
            letter-spacing: 0.5px;
            border-radius: 4px;
            transition: 0.6s
        }

        .btn{
            padding: 1rem 1.8rem;
            background-color: #fff;
            border: 2px solid #fafafa;
            font-size: 1.4rem;
            color: #1abc9c;
            line-height: 1;
            border-radius: 4px;
            outline: none;
            cursor: pointer;
            transition: 0.7s;
            margin-top: 3%;
        }

        .btn:hover {
            background-color: transparent;
            color: #fff
        }

        .social-input-containers span {
            position: absolute;
            top: 0;
            left: 25px;
            transform: translateY(-50%);
            font-size: 0.8rem;
            padding: 0 0.4rem;
            color: transparent;
            pointer-events: none;
            z-index: 500
        }

        .social-input-containers span:before,
        .social-input-containers span:after {
            content: "";
            position: absolute;
            width: 10%;
            opacity: 0;
            transition: 0.3s;
            height: 5px;
            background-color: #0004d5;
            top: 50%;
            transform: translateY(-50%)
        }

        .social-input-containers span:before {
            left: 50%
        }

        .social-input-containers span:after {
            right: 50%
        }

        .social-input-containers.focus label {
            top: 0;
            transform: translateY(-50%);
            left: 25px;
            font-size: 0.8rem
        }

        .social-input-containers.focus span:before,
        .social-input-containers.focus span:after {
            width: 50%;
            opacity: 1
        }

        @media (max-width: 850px) {
            .form {
                grid-template-columns: 1fr
            }

            .contact-info:before {
                bottom: initial;
                top: -75px;
                right: 65px;
                transform: scale(0.95)
            }

            .contact-info-form:before {
                top: -13px;
                left: initial;
                right: 70px
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 1.5rem
            }

            .contact-info:before {
                display: none
            }

            form,
            .contact-info {
                padding: 1.7rem 1.6rem
            }

            .title {
                font-size: 1.15rem
            }

            .input {
                padding: 0.45rem 1.2rem
            }

            .btn {
                padding: 0.45rem 1.2rem
            }
        }
    </style>

</head>

<body class="bg-light">

    <div class="container">
        <div class="contact-info-form">
            <span class="circle one"></span> <span class="circle two"></span>
            <form action="<?= base_url('MyApp/carValidation'); ?>" autocomplete="off" method="post">
                <h3 class="title">Register a new car</h3>
                <div class="social-input-containers">
                    <input type="text" name="name" class="input" placeholder="Name" value="<?= set_value('name') ?>" />
                    <?= form_error('name') ?>
                </div>
                <div class="social-input-containers">
                    <input type="text" name="model" class="input" placeholder="Model" value="<?= set_value('model') ?>" />
                    <?= form_error('model') ?>
                </div>
                <div class="social-input-containers">
                    <input type="text" pattern="[1-9]+" title="from 1 seat and above" name="seats" class="input" placeholder="Seats" value="<?= set_value('seats') ?>" />
                    <?= form_error('seats') ?>
                </div>
                <div class="social-input-containers">
                    <input type="text" name="price" class="input" placeholder="Hireprice" value="<?= set_value('price') ?>" />
                    <?= form_error('price') ?>
                </div>
                <div class="social-input-containers">
                    <input type="file" name="carimage" class="input" required/>
                    <?= form_error('carImage') ?>
                </div>
                <input type="submit" value="Register" class="btn" />
            </form>
        </div>
    </div>

</body>

</html>