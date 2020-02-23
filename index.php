
<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Contact Us</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/style.css">
        <script async type="text/javascript" src="javascript/javascript.js"></script>
        

    </head>
    <body class="vollkorn bg-light">
        <? include 'controllers/controller.php'; ?>
        <div class="container h-100">
            <div class="row justify-content-center ">
                <div class="py-5">
                    <div>
                        <h1 class="text-center font-weight-bold text-info">Contact Us</h1>
                    </div>
                    
                    <form class="" id="form" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="return check_empty_fields(this);">
                        
                        <div class="">
                            <div class="form-group py-1">
                                <input class="form-control" title="First Name" type="text" name="first_name" class="" value="<?= htmlspecialchars($_POST['first_name']) ?>" placeholder="*Enter your First Name" autofocus>
                                <span class="warning" id="first_name_warning"><?= $errors["first_name"]?></span>
                            </div>
                            
                            <div class="form-group py-1">
                                <input class="form-control" title="Last Name" type="text" name="last_name" class="" value="<?= htmlspecialchars($_POST['last_name']) ?>" placeholder="*Enter your Last Name">
                                <span class="warning" id="last_name_warning"><?= $errors["last_name"]?></span>
                            </div>
                            
                            <div class="form-group py-1">
                                <select class="form-control" title="Country" name="country">
                                    <?if(htmlspecialchars($_POST['country'])):?>
                                        <option value="<?=htmlspecialchars($_POST['country'])?>" selected><?= htmlspecialchars($_POST['country']) ?></option>
                                    <?else:?>
                                        <option value="" selected>*Choose your Country</option>
                                    <?endif?>
                                    <? foreach(get_list_of_countries() as $country): ?>
                                        <option value="<?= $country["name"]; ?>"><?= $country["name"]; ?></option>
                                    <? endforeach?>
                                </select>
                                <span class="warning" id="country_warning"><?= $errors["country"]?></span>
                            </div>

                            <div class="form-group py-1">
                                <input class="form-control" title="Phone Number" type="text" name="phone_number" class="" value="<?= htmlspecialchars($_POST['phone_number']) ?>" placeholder="*Enter your Phone Number">
                                <span class="warning" id="phone_number_warning"><?=  $errors["phone_number"]?></span>
                            </div>
                            
                            <div class="form-group py-1">
                                <input class="form-control" title="Email" type="text" name="email" class="" value="<?= htmlspecialchars($_POST['email']) ?>" placeholder="*Enter your Email">
                                <span class="warning" id="email_warning"><?= $errors["email"]?></span>
                            </div>

                            <div class="form-group py-1">
                                <button type="submit" class="btn bg-info text-light btn-block" name="save">Send</button>
                                
                            </div>
                            <div class="<?= $notification[0] ?>"><?= htmlspecialchars($notification[1])?></div>
                            
                        </div>

                        <!-- Ofcourse i would add reCapcha to block spammers -->

                    </form>
                </div>
                
            </div>
            
        </div>
        
    </body>
</html>