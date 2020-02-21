
<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Contact Us</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/style.css"
        

    </head>
    <body class="vollkorn">
        <?php require_once 'controllers/contact_form.php'; ?>
        <div class="container h-100">
            <div class="row justify-content-center ">
                <div class="py-5">
                    <h1 class="text-center font-weight-bold">Contact Us</h1>
                    <form class="" action="" method="">
                        
                        <div class="">
                            <div class="form-group">
                                <input class="form-control" type="text" name="first_name" class="" value="" placeholder="Enter your First Name">
                            </div>
                            
                            <div class="form-group">
                                <input class="form-control" type="text" name="last_name" class="" value="" placeholder="Enter your Last Name">
                            </div>
                            
                            <div class="form-group">
                                <select class="form-control">
                                    <option >Choose your Country</option>
                                    <? foreach(get_list_of_countries() as $country): ?>
                                        <option value="<?php echo $country["name"]; ?>"><?php echo $country["name"]; ?></option>
                                    <? endforeach?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="text" name="phone_number" class="" value="" placeholder="Enter your Phone Number">
                            </div>
                            
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" class="" value="" placeholder="Enter your Email">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" name="save">Save</button>
                            </div>
                            
                        </div>
                        
                    </form>
                </div>
                
            </div>
            
        </div>
        
    </body>
</html>